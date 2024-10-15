<?php

class SuratKeluarModel
{
    private $table = 'surat_keluar';  // Nama tabel surat_keluar
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Mengambil semua data surat keluar dengan join ke user
    public function getAllSuratKeluar()
    {
        $this->db->query('SELECT surat_keluar.*, user.nama AS nama_user 
                          FROM ' . $this->table . ' 
                          LEFT JOIN user ON surat_keluar.user_id = user.id');
        return $this->db->resultSet();
    }

    public function getSuratKeluarById($id)
    {
        $this->db->query('SELECT surat_keluar.*, user.nama AS nama_user 
                          FROM ' . $this->table . ' 
                          LEFT JOIN user ON surat_keluar.user_id = user.id
                          WHERE surat_keluar.id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahSuratKeluar($data)
    {
        $query = "INSERT INTO surat_keluar (no_surat, tanggal_surat, penerima, perihal, lampiran, file_surat, user_id) 
                  VALUES (:no_surat, :tanggal_surat, :penerima, :perihal, :lampiran, :file_surat, :user_id)";
        $this->db->query($query);
        $this->db->bind('no_surat', $data['no_surat']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('penerima', $data['penerima']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('lampiran', $data['lampiran']);
        $this->db->bind('file_surat', $data['file_surat']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSuratKeluar($data)
    {
        $query = "UPDATE surat_keluar SET no_surat = :no_surat, tanggal_surat = :tanggal_surat, penerima = :penerima, 
                  perihal = :perihal, lampiran = :lampiran, file_surat = :file_surat, user_id = :user_id 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('no_surat', $data['no_surat']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('penerima', $data['penerima']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('lampiran', $data['lampiran']);
        $this->db->bind('file_surat', $data['file_surat']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // Menghapus data surat keluar berdasarkan ID
    public function deleteSuratKeluar($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // Mencari data surat keluar berdasarkan keyword
    public function cariSuratKeluar()
    {
        $key = $_POST['key'];

        $this->db->query("SELECT surat_keluar.*, user.nama AS nama_user 
                          FROM " . $this->table . " 
                          LEFT JOIN user ON surat_keluar.user_id = user.id
                          WHERE surat_keluar.no_surat LIKE :key OR surat_keluar.penerima LIKE :key OR surat_keluar.perihal LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
