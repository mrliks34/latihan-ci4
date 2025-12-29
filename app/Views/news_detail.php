<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="<?= base_url('/') ?>" class="text-decoration-none text-muted mb-3 d-inline-block font-weight-bold">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Berita
            </a>

            <h1 class="font-weight-bold mb-3 display-4 text-dark"><?= $news['title'] ?></h1>

            <div class="d-flex align-items-center mb-4 text-muted">
                <div class="mr-3">
                    <i class="far fa-calendar-alt mr-1"></i> <?= date('d F Y', strtotime($news['created_at'])) ?>
                </div>
                <div>
                    <i class="far fa-user mr-1"></i> Admin
                </div>
            </div>

            <hr>

            <div class="news-content mt-4 text-justify" style="line-height: 1.8; font-size: 1.1rem; color: #444;">
                <?= $news['content'] ?>
            </div>

            <div class="mt-5 p-4 bg-light rounded text-center">
                <p class="font-weight-bold mb-2">Bagikan berita ini:</p>
                <button class="btn btn-primary btn-sm rounded-circle mx-1"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-info btn-sm rounded-circle mx-1"><i class="fab fa-twitter"></i></button>
                <button class="btn btn-success btn-sm rounded-circle mx-1"><i class="fab fa-whatsapp"></i></button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>