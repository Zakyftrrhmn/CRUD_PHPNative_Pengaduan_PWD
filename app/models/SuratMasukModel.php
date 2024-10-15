<?php

class SuratMasukModel
{
    private $table = 'surat_masuk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSuratMasuk()
    {
        $this->db->query('SELECT surat_masuk.*, disposisi.keterangan AS disposisi_keterangan, disposisi.status AS disposisi_status, user.nama AS nama_user 
                          FROM ' . $this->table . ' 
                          LEFT JOIN disposisi ON disposisi.surat_masuk_id = surat_masuk.id
                          LEFT JOIN user ON surat_masuk.user_id = user.id');
        return $this->db->resultSet();
    }

    public function getSuratMasukById($id)
    {
        $this->db->query('SELECT surat_masuk.*, disposisi.keterangan AS disposisi_keterangan, disposisi.status AS disposisi_status, user.nama AS nama_user 
                          FROM ' . $this->table . ' 
                          LEFT JOIN disposisi ON disposisi.surat_masuk_id = surat_masuk.id
                          LEFT JOIN user ON surat_masuk.user_id = user.id
                          WHERE surat_masuk.id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahSuratMasuk($data)
    {
        $query = "INSERT INTO surat_masuk (no_surat, tanggal_surat, tanggal_terima, pengirim, perihal, lampiran, file_surat, user_id) 
                  VALUES (:no_surat, :tanggal_surat, :tanggal_terima, :pengirim, :perihal, :lampiran, :file_surat, :user_id)";
        $this->db->query($query);
        $this->db->bind('no_surat', $data['no_surat']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('tanggal_terima', $data['tanggal_terima']);
        $this->db->bind('pengirim', $data['pengirim']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('lampiran', $data['lampiran']);
        $this->db->bind('file_surat', $data['file_surat']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSuratMasuk($data)
    {
        $query = "UPDATE surat_masuk SET no_surat = :no_surat, tanggal_surat = :tanggal_surat, tanggal_terima = :tanggal_terima, 
                  pengirim = :pengirim, perihal = :perihal, lampiran = :lampiran, file_surat = :file_surat, user_id = :user_id 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('no_surat', $data['no_surat']);
        $this->db->bind('tanggal_surat', $data['tanggal_surat']);
        $this->db->bind('tanggal_terima', $data['tanggal_terima']);
        $this->db->bind('pengirim', $data['pengirim']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('lampiran', $data['lampiran']);
        $this->db->bind('file_surat', $data['file_surat']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSuratMasuk($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariSuratMasuk()
    {
        $key = $_POST['key'];

        $this->db->query("SELECT surat_masuk.*, disposisi.keterangan AS disposisi_keterangan, disposisi.status AS disposisi_status, user.nama AS nama_user 
                          FROM " . $this->table . " 
                          LEFT JOIN disposisi ON disposisi.surat_masuk_id = surat_masuk.id
                          LEFT JOIN user ON surat_masuk.user_id = user.id
                          WHERE surat_masuk.no_surat LIKE :key OR surat_masuk.pengirim LIKE :key OR surat_masuk.perihal LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
