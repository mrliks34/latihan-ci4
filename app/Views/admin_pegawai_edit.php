<?= $this->extend('layout/admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Data Pegawai</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/pegawai/update/' . $p['id_pegawai']) ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" value="<?= $p['nama_pegawai'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Divisi</label>
                <select name="divisi" class="form-select">
                    <option value="IT" <?= ($p['divisi'] == 'IT') ? 'selected' : '' ?>>IT / Tech</option>
                    <option value="HR" <?= ($p['divisi'] == 'HR') ? 'selected' : '' ?>>HR (Human Resources)</option>
                    <option value="Produksi" <?= ($p['divisi'] == 'Produksi') ? 'selected' : '' ?>>Produksi</option>
                    <option value="Marketing" <?= ($p['divisi'] == 'Marketing') ? 'selected' : '' ?>>Marketing</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $p['tanggal_lahir'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="Laki-laki" <?= ($p['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= ($p['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Ganti Foto (Opsional)</label>
                <input type="file" name="foto_pegawai" class="form-control">
                <div class="mt-2 p-2 border rounded bg-light d-inline-block">
                    <small class="d-block text-muted mb-1">Foto Saat Ini:</small>
                    <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>" width="100" class="rounded">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update Data</button>
                <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">Batal</a>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection() ?>