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
            <form role="form" action="<?= base_url; ?>/disposisi/updateDisposisi" method="POST">
                <input type="hidden" name="id" value="<?= $data['disposisi']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="surat_masuk_id">No. Surat Masuk</label>
                        <select class="form-control" name="surat_masuk_id" id="surat_masuk_id" required>
                            <option value="">Pilih No. Surat Masuk</option>
                            <?php foreach ($data['surat_masuk'] as $surat): ?>
                                <option value="<?= $surat['id']; ?>" <?= $surat['id'] == $data['disposisi']['surat_masuk_id'] ? 'selected' : ''; ?>>
                                    <?= $surat['no_surat']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_disposisi">Tanggal Disposisi</label>
                        <input type="date" class="form-control" id="tanggal_disposisi" name="tanggal_disposisi" value="<?= $data['disposisi']['tanggal_disposisi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['disposisi']['keterangan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $data['disposisi']['pengirim']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="diterima" <?= $data['disposisi']['status'] == 'diterima' ? 'selected' : ''; ?>>Diterima</option>
                            <option value="ditindaklanjuti" <?= $data['disposisi']['status'] == 'ditindaklanjuti' ? 'selected' : ''; ?>>Ditindaklanjuti</option>
                            <option value="selesai" <?= $data['disposisi']['status'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">user ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $data['disposisi']['user_id']; ?>" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->