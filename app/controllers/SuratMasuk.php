<?php

class SuratMasuk extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Surat Masuk';
        $data['surat_masuk'] = $this->model('SuratMasukModel')->getAllSuratMasuk();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('surat_masuk/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Surat Masuk';
        $data['surat_masuk'] = $this->model('SuratMasukModel')->cariSuratMasuk();
        $data['key'] = $_POST['key'];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('surat_masuk/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Surat Masuk';
        $data['surat_masuk'] = $this->model('SuratMasukModel')->getSuratMasukById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('surat_masuk/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Surat Masuk';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('surat_masuk/create', $data);
        $this->view('templates/footer');
    }

    public function simpanSuratMasuk()
    {
        // Handle file upload
        $fileName = $_FILES['file_surat']['name'];
        $fileTmp = $_FILES['file_surat']['tmp_name'];
        $uploadDir = __DIR__ . '/../uploads/'; // Menggunakan jalur absolut

        // Memeriksa ekstensi file
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        if (in_array($_FILES['file_surat']['type'], $allowedTypes)) {
            // Mengganti spasi dengan underscore
            $fileName = str_replace(' ', '_', $fileName);

            if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
                // Berhasil mengupload
                $data = [
                    'no_surat' => $_POST['no_surat'],
                    'tanggal_surat' => $_POST['tanggal_surat'],
                    'tanggal_terima' => $_POST['tanggal_terima'],
                    'pengirim' => $_POST['pengirim'],
                    'perihal' => $_POST['perihal'],
                    'lampiran' => $_POST['lampiran'],
                    'file_surat' => $fileName,
                    'user_id' => $_POST['user_id']
                ];

                // Simpan data ke database
                if ($this->model('SuratMasukModel')->tambahSuratMasuk($data) > 0) {
                    Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
                    header('location:' . base_url . '/suratMasuk');
                    exit;
                } else {
                    Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
                    header('location:' . base_url . '/suratMasuk');
                    exit;
                }
            } else {
                echo "Upload gagal.";
            }
        } else {
            echo "Tipe file tidak diperbolehkan.";
        }
    }


    public function updateSuratMasuk()
    {
        // Handle file upload if a new file is uploaded
        $fileName = $_FILES['file_surat']['name'];
        $fileTmp = $_FILES['file_surat']['tmp_name'];
        $uploadDir = __DIR__ . '/../uploads/'; // Menggunakan jalur absolut

        // Check if a new file is uploaded
        if ($fileName) {
            // Move the new uploaded file
            if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
                // Delete old file if exists
                $oldFile = $this->model('SuratMasukModel')->getSuratMasukById($_POST['id'])['file_surat'];
                if (file_exists($uploadDir . $oldFile)) {
                    unlink($uploadDir . $oldFile);
                }
            } else {
                Flasher::setMessage('Gagal mengunggah file baru', '', 'danger');
                header('location:' . base_url . '/suratMasuk/edit/' . $_POST['id']);
                exit;
            }
        } else {
            // If no new file is uploaded, keep the old file
            $fileName = $_POST['file_surat_lama'];
        }

        $data = [
            'id' => $_POST['id'],
            'no_surat' => $_POST['no_surat'],
            'tanggal_surat' => $_POST['tanggal_surat'],
            'tanggal_terima' => $_POST['tanggal_terima'],
            'pengirim' => $_POST['pengirim'],
            'perihal' => $_POST['perihal'],
            'lampiran' => $_POST['lampiran'],
            'file_surat' => $fileName,
            'user_id' => $_POST['user_id']
        ];

        if ($this->model('SuratMasukModel')->updateDataSuratMasuk($data) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/suratMasuk');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/suratMasuk');
            exit;
        }
    }


    public function hapus($id)
    {
        // Mendapatkan nama file surat sebelum menghapus data
        $fileSurat = $this->model('SuratMasukModel')->getSuratMasukById($id)['file_surat'];

        // Hapus data surat masuk
        if ($this->model('SuratMasukModel')->deleteSuratMasuk($id) > 0) {
            // Hapus file fisik jika ada
            $filePath = 'uploads/' . $fileSurat;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/suratMasuk');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location:' . base_url . '/suratMasuk');
            exit;
        }
    }
}
