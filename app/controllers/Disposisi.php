<?php

class Disposisi extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Disposisi';
        $data['disposisi'] = $this->model('DisposisiModel')->getAllDisposisi();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('disposisi/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Disposisi';
        $data['disposisi'] = $this->model('DisposisiModel')->cariDisposisi();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('disposisi/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Disposisi';
        // Ambil semua surat masuk
        $data['surat_masuk'] = $this->model('SuratMasukModel')->getAllSuratMasuk();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('disposisi/create', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Disposisi';
        $data['disposisi'] = $this->model('DisposisiModel')->getDisposisiById($id);
        // Ambil semua surat masuk untuk dropdown
        $data['surat_masuk'] = $this->model('SuratMasukModel')->getAllSuratMasuk();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('disposisi/edit', $data); // load form edit disposisi
        $this->view('templates/footer');
    }

    public function simpanDisposisi()
    {
        if ($this->model('DisposisiModel')->tambahDisposisi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location:' . base_url . '/disposisi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location:' . base_url . '/disposisi');
            exit;
        }
    }

    public function updateDisposisi()
    {
        if ($this->model('DisposisiModel')->updateDataDisposisi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/disposisi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/disposisi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('DisposisiModel')->deleteDisposisi($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/disposisi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location:' . base_url . '/disposisi');
            exit;
        }
    }
}
