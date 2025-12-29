<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="hero-section text-center" style="background: linear-gradient(135deg, #11998e, #38ef7d); padding-top: 40px; padding-bottom: 60px;">
    <div class="container">
        <h1 class="font-weight-bold text-white display-4">Riwayat Pendidikan</h1>
        <p class="lead text-white-50">Perjalanan akademis dari dasar hingga perguruan tinggi.</p>
    </div>
</div>

<div class="container mb-5" style="margin-top: -30px;">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card shadow border-0 mb-4">
                <div class="card-body">
                    <form action="" method="get" class="row">
                        <div class="col-md-4 mb-2">
                            <input type="text" class="form-control" name="keyword" placeholder="Cari sekolah..." value="<?= $keyword ?>">
                        </div>
                        <div class="col-md-3 mb-2">
                            <select name="jenjang" class="form-control">
                                <option value="">Semua Jenjang</option>
                                <option value="SD" <?= $jenjang == 'SD' ? 'selected' : '' ?>>SD</option>
                                <option value="SMP" <?= $jenjang == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                <option value="SMA/SMK" <?= $jenjang == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK</option>
                                <option value="S1" <?= $jenjang == 'S1' ? 'selected' : '' ?>>S1 (Kuliah)</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <select name="order" class="form-control">
                                <option value="DESC" <?= $order == 'DESC' ? 'selected' : '' ?>>Tahun Terbaru</option>
                                <option value="ASC" <?= $order == 'ASC' ? 'selected' : '' ?>>Tahun Terlama</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-success btn-block" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php foreach ($education as $e): ?>
                <div class="card shadow-sm mb-3 border-left-success" style="border-left: 5px solid #28a745;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 font-weight-bold text-dark"><?= $e['nama_sekolah']; ?></h5>
                            <span class="badge badge-success px-3 py-2"><?= $e['jenjang']; ?></span>
                            <p class="text-muted mb-0 mt-2 small">
                                <i class="fas fa-user-graduate mr-2"></i>Lulus Tahun: <strong><?= $e['tahun_lulus']; ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="mt-4 d-flex justify-content-center">
                <?= $pager->links('education', 'default_full'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>