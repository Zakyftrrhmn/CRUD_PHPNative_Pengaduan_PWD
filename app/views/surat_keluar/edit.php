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
                <h3 class="card-title">Edit Surat Keluar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/suratKeluar/updateSuratKeluar" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['surat_keluar']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>No Surat</label>
                        <input type="text" class="form-control" placeholder="Masukkan no surat..." name="no_surat" value="<?= $data['surat_keluar']['no_surat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="date" class="form-control" name="tanggal_surat" value="<?= $data['surat_keluar']['tanggal_surat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Penerima</label>
                        <input type="text" class="form-control" placeholder="Masukkan penerima..." name="penerima" value="<?= $data['surat_keluar']['penerima']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" class="form-control" placeholder="Masukkan perihal..." name="perihal" value="<?= $data['surat_keluar']['perihal']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <textarea class="form-control" placeholder="Masukkan lampiran..." name="lampiran"><?= $data['surat_keluar']['lampiran']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Surat</label>
                        <input type="file" class="form-control" name="file_surat">
                        <small>File yang sudah ada: <?= $data['surat_keluar']['file_surat']; ?></small>
                        <input type="hidden" name="file_surat_lama" value="<?= $data['surat_keluar']['file_surat']; ?>">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Surat Keluar</button>
                    <a href="<?= base_url; ?>/suratKeluar" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->