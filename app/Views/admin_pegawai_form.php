<?= $this->extend('layout/admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5>Tambah Pegawai Baru</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/pegawai/store') ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Divisi</label>
                <select name="divisi" class="form-select">
                    <option value="IT">IT / Tech</option>
                    <option value="HR">HR (Human Resources)</option>
                    <option value="Produksi">Produksi</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Foto Pegawai</label>
                <input type="file" name="foto_pegawai" class="form-control">
                <small class="text-muted">Format: jpg/png/jpeg</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>