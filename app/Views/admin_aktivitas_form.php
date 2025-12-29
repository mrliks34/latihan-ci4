<?= $this->extend('layout/admin/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">Tambah Aktivitas</div>
        <div class="card-body">
            <form action="/admin/activities/store" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jam</label>
                    <input type="time" name="jam" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Aktivitas</label>
                    <input type="text" name="nama_aktivitas" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto/Bukti</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/admin/activities" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>