<?= $this->extend('layout/page_layout') ?> <?= $this->section('content') ?>

<div class="hero-section text-center" style="background: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);">
    <div class="container">
        <h1 class="font-weight-bold text-white">Berita Terkini</h1>
        <p class="lead text-white-50">Informasi terbaru seputar kegiatan dan teknologi.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <?php foreach ($newses as $news) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div style="height: 180px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-newspaper fa-3x text-secondary"></i>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            <span class="badge badge-primary px-2">News</span>
                        </div>
                        <h5 class="card-title font-weight-bold">
                            <a href="<?= base_url('news/' . $news['slug']) ?>" class="text-dark text-decoration-none">
                                <?= $news['title'] ?>
                            </a>
                        </h5>
                        <p class="card-text text-muted small flex-grow-1">
                            <?= substr(strip_tags($news['content']), 0, 100) ?>...
                        </p>
                        <a href="<?= base_url('news/' . $news['slug']) ?>" class="btn btn-outline-primary btn-sm rounded-pill mt-3 font-weight-bold">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>