<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4 newspaper-title">TIM REDAKSI KAMI</h2>

    <div class="row">
        <?php foreach ($pegawai as $p): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body">
                        <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>"
                            class="rounded-circle mb-3 border border-3 border-dark"
                            width="120" height="120" style="object-fit: cover;">

                        <h5 class="fw-bold mb-1"><?= $p['nama_pegawai'] ?></h5>
                        <p class="text-muted small"><?= $p['jenis_kelamin'] ?></p>
                        <span class="badge bg-light text-dark border">
                            🎂 <?= date('d M Y', strtotime($p['tanggal_lahir'])) ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>