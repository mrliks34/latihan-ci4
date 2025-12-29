<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="hero-section text-center" style="background: linear-gradient(135deg, #667eea, #764ba2);">
    <div class="container">
        <h1 class="font-weight-bold">Biodata Diri</h1>
        <p class="lead">Curriculum Vitae & Informasi Personal.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="" method="get" class="input-group">
                <input type="text" class="form-control rounded-pill px-4" name="keyword" placeholder="Cari nama..." value="<?= $keyword ?>">
                <div class="input-group-append ml-2">
                    <button class="btn btn-primary rounded-pill px-4" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php foreach ($biodata as $b): ?>
            <div class="col-lg-10 mb-4">
                <div class="card shadow-lg overflow-hidden">
                    <div class="row no-gutters">
                        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-4">
                            <?php if ($b['foto_profil']): ?>
                                <img src="/uploads/biodata/<?= $b['foto_profil']; ?>" class="img-fluid rounded-circle shadow border border-white" style="width: 180px; height: 180px; object-fit: cover;">
                            <?php else: ?>
                                <i class="fas fa-user-circle fa-7x text-secondary"></i>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h2 class="card-title font-weight-bold text-dark"><?= $b['nama_lengkap']; ?></h2>
                                <p class="text-primary mb-3"><i class="fas fa-envelope mr-2"></i><?= $b['email']; ?> &bull; <i class="fas fa-phone mx-2"></i><?= $b['no_hp']; ?></p>

                                <hr>
                                <h6 class="font-weight-bold text-uppercase text-secondary small">Tentang Saya</h6>
                                <p class="card-text text-muted"><?= $b['deskripsi_diri']; ?></p>

                                <h6 class="font-weight-bold text-uppercase text-secondary small mt-4">Alamat</h6>
                                <p class="card-text text-muted"><i class="fas fa-map-marker-alt mr-2 text-danger"></i><?= $b['alamat']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <?= $pager->links('biodata', 'default_full'); ?>
    </div>
</div>

<?= $this->endSection(); ?>