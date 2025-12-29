<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<div class="hero-section text-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding-top: 40px; padding-bottom: 60px;">
    <div class="container">
        <h1 class="font-weight-bold text-white display-4">Tim ILKOM C</h1>
        <p class="lead text-white-50">Orang-orang hebat dibalik layar.</p>
    </div>
</div>

<div class="container mb-5" style="margin-top: -30px;">
    <div class="card shadow border-0 mb-4">
        <div class="card-body">
            <form action="" method="get" class="row">
                <div class="col-md-4 mb-2">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari nama pegawai..." value="<?= $keyword ?>">
                </div>

                <div class="col-md-3 mb-2">
                    <select name="divisi" class="form-control">
                        <option value="">- Semua Divisi -</option>
                        <option value="IT" <?= $divisi == 'IT' ? 'selected' : '' ?>>IT Developer</option>
                        <option value="HR" <?= $divisi == 'HR' ? 'selected' : '' ?>>Human Resource</option>
                        <option value="Marketing" <?= $divisi == 'Marketing' ? 'selected' : '' ?>>Marketing</option>
                        <option value="Produksi" <?= $divisi == 'Produksi' ? 'selected' : '' ?>>Produksi</option>
                    </select>
                </div>

                <div class="col-md-3 mb-2">
                    <select name="order" class="form-control">
                        <option value="ASC" <?= $order == 'ASC' ? 'selected' : '' ?>>Nama (A-Z)</option>
                        <option value="DESC" <?= $order == 'DESC' ? 'selected' : '' ?>>Nama (Z-A)</option>
                    </select>
                </div>

                <div class="col-md-2 mb-2">
                    <button class="btn btn-primary btn-block font-weight-bold" type="submit">Terapkan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <?php foreach ($pegawai as $p): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 text-center hover-card">
                    <div class="card-body p-4">
                        <div class="mb-3 position-relative d-inline-block">
                            <?php if ($p['foto_pegawai']): ?>
                                <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>"
                                    class="rounded-circle shadow-sm"
                                    width="120" height="120" style="object-fit: cover; border: 4px solid #f8f9fa;">
                            <?php else: ?>
                                <img src="https://ui-avatars.com/api/?name=<?= $p['nama_pegawai'] ?>&background=random"
                                    class="rounded-circle shadow-sm"
                                    width="120" height="120" style="border: 4px solid #f8f9fa;">
                            <?php endif; ?>
                        </div>

                        <h5 class="fw-bold mb-1 text-dark"><?= esc($p['nama_pegawai']) ?></h5>

                        <?php
                        $badgeColor = 'badge-secondary';
                        if ($p['divisi'] == 'IT') $badgeColor = 'badge-primary';
                        if ($p['divisi'] == 'HR') $badgeColor = 'badge-danger';
                        if ($p['divisi'] == 'Marketing') $badgeColor = 'badge-warning text-dark';
                        if ($p['divisi'] == 'Produksi') $badgeColor = 'badge-success';
                        ?>
                        <span class="badge <?= $badgeColor ?> px-3 mt-2">
                            <?= esc($p['divisi']) ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('pegawai', 'default_full'); ?>
    </div>
</div>
<?= $this->endSection() ?>