<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container" style="margin-top: 80px; margin-bottom: 80px;">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-success fade show" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>

            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0 font-weight-bold">👤 Profil Saya</h4>
                    <small>Kelola informasi akun Anda</small>
                </div>

                <div class="card-body p-4">
                    <form action="<?= base_url('profile/update') ?>" method="post">

                        <div class="form-group mb-3">
                            <label class="font-weight-bold text-muted">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control form-control-lg" value="<?= esc($user['name']) ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-muted">Alamat Email</label>
                            <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
                        </div>

                        <hr class="my-4">

                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-danger">Ganti Password</label>
                            <small class="d-block text-muted mb-2">Kosongkan jika tidak ingin mengubah password.</small>

                            <div class="input-group">
                                <input type="password" name="password" id="passProfile" class="form-control" placeholder="Password Baru...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassProfile()">👁️</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-bold shadow-sm">
                                Simpan Perubahan
                            </button>
                            <a href="<?= base_url('/') ?>" class="btn btn-light btn-block text-muted mt-2">
                                ← Kembali ke Beranda
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function togglePassProfile() {
        var x = document.getElementById("passProfile");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?= $this->endSection() ?>