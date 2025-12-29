<?= $this->extend('layout/admin/admin_layout'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">Form Biodata</div>
        <div class="card-body">
            <form action="/admin/biodata/store" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
                <div class="row mb-3">
                    <div class="col"><label>Email</label><input type="email" name="email" class="form-control"></div>
                    <div class="col"><label>No HP</label><input type="text" name="no_hp" class="form-control"></div>
                </div>
                <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control"></textarea></div>
                <div class="mb-3"><label>Deskripsi Diri</label><textarea name="deskripsi_diri" class="form-control"></textarea></div>
                <div class="mb-3"><label>Foto Profil</label><input type="file" name="foto_profil" class="form-control"></div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>