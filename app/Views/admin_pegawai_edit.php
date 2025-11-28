<?= $this->extend('layout/admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= base_url('admin/pegawai/update/' . $p['id_pegawai']) ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" value="<?= $p['nama_pegawai'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $p['tanggal_lahir'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="Laki-laki" <?= ($p['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= ($p['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Ganti Foto (Opsional)</label>
                <input type="file" name="foto_pegawai" class="form-control">
                <div class="mt-2">
                    <p>Foto Saat Ini:</p>
                    <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>" width="100">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update Data</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>