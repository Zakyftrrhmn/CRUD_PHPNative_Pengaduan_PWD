<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Surat Keluar</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Surat Keluar</h3>
            </div>

            <form role="form" action="<?= base_url; ?>/suratKeluar/simpanSuratKeluar" method="POST" enctype="multipart/form-data">
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
                        <label>Penerima</label>
                        <input type="text" class="form-control" placeholder="Masukkan penerima..." name="penerima" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" class="form-control" placeholder="Masukkan perihal..." name="perihal" required>
                    </div>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <input type="text" class="form-control" placeholder="Masukkan lampiran..." name="lampiran" required>
                    </div>
                    <div class="form-group">
                        <label>File Surat</label>
                        <input type="file" class="form-control" name="file_surat" required>
                    </div>
                    <div class="form-group">
                        <label>user ID</label>
                        <input type="text" class="form-control" placeholder="Masukkan User ID..." name="user_id" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Surat Keluar</button>
                    <a href="<?= base_url; ?>/suratKeluar" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </section>
</div>