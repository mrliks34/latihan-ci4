<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center bg-dark text-white py-5">
    <div class="container">
        <h1 class="font-weight-bold">Tentang ILKOM C</h1>
        <p class="lead text-white-50">Mengenal lebih dekat siapa kami.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            <img src="https://source.unsplash.com/random/600x400/?technology,office" class="img-fluid rounded shadow" alt="Tentang Kami">
        </div>
        <div class="col-md-6">
            <h2 class="font-weight-bold mb-3 text-primary">Visi & Misi Kami</h2>
            <p class="text-muted" style="line-height: 1.8;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia modi unde cumque! Cum repellendus eveniet, illum id doloribus, quibusdam tenetur debitis est libero quasi assumenda voluptates aliquam tempore. Porro, asperiores.
            </p>
            <p class="text-muted" style="line-height: 1.8;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi vero aliquid, voluptatum est at iusto nihil, tempora quis soluta officiis nemo.
            </p>
            <a href="<?= base_url('contact') ?>" class="btn btn-outline-primary rounded-pill px-4 mt-3">Hubungi Kami</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>