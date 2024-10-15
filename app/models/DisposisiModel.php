<?php

class DisposisiModel
{
    private $table = 'disposisi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDisposisi()
    {
        $this->db->query('SELECT disposisi.*, surat_masuk.no_surat AS no_surat, user.nama AS nama_user 
                          FROM ' . $this->table . ' 
                          LEFT JOIN surat_masuk ON disposisi.surat_masuk_id = surat_masuk.id
                          LEFT JOIN user ON disposisi.user_id = user.id');
        return $this->db->resultSet();
    }

    public function getDisposisiById($id)
    {
        $this->db->query('SELECT disposisi.*, surat_masuk.no_surat AS no_surat, user.nama AS nama_user 
                          FROM ' . $this->table . ' 
                          LEFT JOIN surat_masuk ON disposisi.surat_masuk_id = surat_masuk.id
                          LEFT JOIN user ON disposisi.user_id = user.id
                          WHERE disposisi.id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDisposisi($data)
    {
        $query = "INSERT INTO disposisi (surat_masuk_id, tanggal_disposisi, keterangan, pengirim, status, user_id) 
                  VALUES (:surat_masuk_id, :tanggal_disposisi, :keterangan, :pengirim, :status, :user_id)";
        $this->db->query($query);
        $this->db->bind('surat_masuk_id', $data['surat_masuk_id']);
        $this->db->bind('tanggal_disposisi', $data['tanggal_disposisi']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('pengirim', $data['pengirim']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataDisposisi($data)
    {
        $query = "UPDATE disposisi SET surat_masuk_id = :surat_masuk_id, tanggal_disposisi = :tanggal_disposisi, 
                  keterangan = :keterangan, pengirim = :pengirim, status = :status, user_id = :user_id 
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('surat_masuk_id', $data['surat_masuk_id']);
        $this->db->bind('tanggal_disposisi', $data['tanggal_disposisi']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('pengirim', $data['pengirim']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteDisposisi($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDisposisi()
    {
        $key = $_POST['key'];

        $this->db->query("SELECT disposisi.*, surat_masuk.no_surat AS no_surat, user.nama AS nama_user 
                          FROM " . $this->table . " 
                          LEFT JOIN surat_masuk ON disposisi.surat_masuk_id = surat_masuk.id
                          LEFT JOIN user ON disposisi.user_id = user.id
                          WHERE disposisi.keterangan LIKE :key OR disposisi.pengirim LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
