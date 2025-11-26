<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form action="/register/save" method="post">
                        <div class="mb-3"><label>Nama</label><input type="text" name="name" class="form-control"></div>
                        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
                        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control"></div>
                        <div class="mb-3"><label>Confirm Password</label><input type="password" name="confpassword" class="form-control"></div>
                        <button type="submit" class="btn btn-success w-100">Daftar</button>
                    </form>
                    <div class="text-center mt-3"><a href="/login">Sudah punya akun? Login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>