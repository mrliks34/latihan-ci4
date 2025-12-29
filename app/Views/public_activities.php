<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="font-weight-bold">Aktivitas Harian</h1>
        <p class="lead">Catatan kegiatan dan dokumentasi proyek harian.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="" method="get" class="row">
                <div class="col-md-4 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-search"></i></span></div>
                        <input type="text" class="form-control" name="keyword" placeholder="Cari aktivitas..." value="<?= $keyword ?>">
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="date" class="form-control" name="start_date" value="<?= $start_date ?>">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="date" class="form-control" name="end_date" value="<?= $end_date ?>">
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-primary btn-block font-weight-bold" type="submit">Filter</button>
                </div>
            </form>
            <div class="text-right mt-2 small">
                Urutkan: <a href="?sort_by=tanggal&order=DESC">Terbaru</a> | <a href="?sort_by=tanggal&order=ASC">Terlama</a>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($activities as $a): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div style="height: 200px; overflow: hidden; background: #eee;" class="d-flex align-items-center justify-content-center">
                        <?php if ($a['foto']): ?>
                            <img src="/uploads/aktivitas/<?= $a['foto']; ?>" class="w-100 h-100" style="object-fit: cover;">
                        <?php else: ?>
                            <i class="fas fa-image fa-3x text-secondary"></i>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <small class="text-primary font-weight-bold"><i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($a['tanggal'])); ?></small>
                        <h5 class="card-title mt-2 font-weight-bold"><?= $a['nama_aktivitas']; ?></h5>
                        <p class="card-text text-muted small"><i class="far fa-clock"></i> Pukul <?= $a['jam']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('activities', 'default_full'); ?>
    </div>
</div>

<?= $this->endSection(); ?>