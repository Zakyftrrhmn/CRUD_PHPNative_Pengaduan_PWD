<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman User</h1>
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
            <form role="form" action="<?= base_url; ?>/user/updateUser" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" placeholder="masukkan User..." name="nama" value="<?= $data['user']['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="masukkan Username..." name="username" value="<?= $data['user']['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" placeholder="masukkan password..." name="password" value="<?= $data['user']['password']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                            <option value="">Pilih Role...</option>
                            <option value="admin" <?= $data['user']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="petugas" <?= $data['user']['role'] == 'petugas' ? 'selected' : ''; ?>>Petugas</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->