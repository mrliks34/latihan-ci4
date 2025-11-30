<?= $this->extend('layout/admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Data Pegawai</h3>
    <a href="<?= base_url('admin/pegawai/create') ?>" class="btn btn-primary">+ Tambah Pegawai</a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <form action="" method="get">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control bg-light border-0" placeholder="Cari Nama Karyawan..." value="<?= $keyword ?>">
                </div>
                <div class="col-md-3">
                    <select name="divisi" class="form-select bg-light border-0">
                        <option value="">- Semua Divisi -</option>
                        <option value="IT" <?= ($divisi == 'IT') ? 'selected' : '' ?>>IT / Tech</option>
                        <option value="HR" <?= ($divisi == 'HR') ? 'selected' : '' ?>>HR (Human Resources)</option>
                        <option value="Produksi" <?= ($divisi == 'Produksi') ? 'selected' : '' ?>>Produksi</option>
                        <option value="Marketing" <?= ($divisi == 'Marketing') ? 'selected' : '' ?>>Marketing</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100">Cari / Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3">Profil</th>
                        <th>Nama & Divisi</th>
                        <th>Gender</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pegawai)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Data tidak ditemukan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($pegawai as $p): ?>
                            <tr>
                                <td class="ps-4">
                                    <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>"
                                        class="rounded-circle border"
                                        width="45" height="45" style="object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($p['nama_pegawai']) ?></div>
                                    <span class="badge bg-light text-secondary border"><?= esc($p['divisi']) ?></span>
                                </td>
                                <td><?= $p['jenis_kelamin'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/pegawai/edit/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-light text-primary fw-bold border">Edit</a>
                                    <a href="<?= base_url('admin/pegawai/delete/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-light text-danger fw-bold border" onclick="return confirm('Hapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>