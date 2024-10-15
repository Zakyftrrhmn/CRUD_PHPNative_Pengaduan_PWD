<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Edit Surat Keluar</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Surat Masuk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/suratMasuk/updateSuratMasuk" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['surat_masuk']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>No Surat</label>
                        <input type="text" class="form-control" placeholder="Masukkan no surat..." name="no_surat" value="<?= $data['surat_masuk']['no_surat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="date" class="form-control" name="tanggal_surat" value="<?= $data['surat_masuk']['tanggal_surat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input type="date" class="form-control" name="tanggal_terima" value="<?= $data['surat_masuk']['tanggal_terima']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pengirim</label>
                        <input type="text" class="form-control" placeholder="Masukkan penerima..." name="pengirim" value="<?= $data['surat_masuk']['pengirim']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" class="form-control" placeholder="Masukkan perihal..." name="perihal" value="<?= $data['surat_masuk']['perihal']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <textarea class="form-control" placeholder="Masukkan lampiran..." name="lampiran"><?= $data['surat_masuk']['lampiran']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Surat</label>
                        <input type="file" class="form-control" name="file_surat">
                        <small>File yang sudah ada: <?= $data['surat_masuk']['file_surat']; ?></small>
                        <input type="hidden" name="file_surat_lama" value="<?= $data['surat_masuk']['file_surat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>User ID</label>
                        <textarea class="form-control" placeholder="Masukkan User ID..." name="user_id"><?= $data['surat_masuk']['user_id']; ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Surat Masuk</button>
                    <a href="<?= base_url; ?>/suratMasuk" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->