<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/disposisi/simpanDisposisi" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="surat_masuk_id">No. Surat Masuk</label>
                        <select class="form-control" name="surat_masuk_id" id="surat_masuk_id" required>
                            <option value="">Pilih No. Surat Masuk</option>
                            <?php foreach ($data['surat_masuk'] as $surat): ?>
                                <option value="<?= $surat['id']; ?>"><?= $surat['no_surat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_disposisi">Tanggal Disposisi</label>
                        <input type="date" class="form-control" id="tanggal_disposisi" name="tanggal_disposisi" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan..." required>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan pengirim..." required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="diterima">Diterima</option>
                            <option value="ditindaklanjuti">Ditindaklanjuti</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Masukkan user_id..." required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->