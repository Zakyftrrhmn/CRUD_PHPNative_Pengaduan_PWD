<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Tambah Surat Masuk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Surat Masuk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/suratMasuk/simpanSuratMasuk" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>No Surat</label>
                        <input type="text" class="form-control" placeholder="Masukkan no surat..." name="no_surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="date" class="form-control" name="tanggal_surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input type="date" class="form-control" name="tanggal_terima" required>
                    </div>
                    <div class="form-group">
                        <label>Pengirim</label>
                        <input type="text" class="form-control" placeholder="Masukkan penerima..." name="pengirim" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" class="form-control" placeholder="Masukkan perihal..." name="perihal" required>
                    </div>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <textarea class="form-control" placeholder="Masukkan lampiran..." name="lampiran"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_surat">File Surat (jpg, png, pdf)</label>
                        <input type="file" class="form-control" name="file_surat">
                    </div>
                    <div class="form-group">
                        <label for="user_id">user ID</label>
                        <input type="texxt" class="form-control" name="user_id">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Surat Masuk</button>
                    <a href="<?= base_url; ?>/suratMasuk" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->