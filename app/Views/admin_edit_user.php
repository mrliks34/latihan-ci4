<?= $this->extend('layout/admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white">
        <h5>Edit Akun User</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/users/' . $user['id'] . '/update') ?>" method="post">

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Role (Hak Akses)</label>
                <select name="role" class="form-select">
                    <option value="user" <?= ($user['role'] == 'user') ? 'selected' : '' ?>>User Biasa</option>
                    <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Password Baru <small class="text-danger">(Biarkan kosong jika tidak ingin mengganti)</small></label>
                <input type="password" name="password" class="form-control" placeholder="Isi hanya jika ingin ganti password">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>