<?php

class User extends Controller
{
    public function index()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->model('UserModel')->getAllUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->model('UserModel')->cariUser();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->model('UserModel')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/edit', $data);
        $this->view('templates/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Tambah User';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/create', $data);
        $this->view('templates/footer');
    }

    public function simpanUser()
    {
        if ($this->model('UserModel')->tambahUser($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location:' . base_url . '/user');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location:' . base_url . '/user');
            exit;
        }
    }

    public function updateUser()
    {
        if ($this->model('UserModel')->updateDataUser($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/user');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/user');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('UserModel')->deleteUser($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/user');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location:' . base_url . '/user');
            exit;
        }
    }
}
