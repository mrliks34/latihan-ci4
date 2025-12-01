<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4 newspaper-title">TIM ILKOM C MALAM</h2>

    <div class="row">
        <?php foreach ($pegawai as $p): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0 text-center hover-card">
                    <div class="card-body p-4">
                        <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>"
                            class="rounded-circle mb-3 border border-3 border-white shadow-sm"
                            width="120" height="120" style="object-fit: cover;">

                        <h5 class="fw-bold mb-1 text-dark"><?= esc($p['nama_pegawai']) ?></h5>

                        <?php
                        $badgeColor = 'bg-secondary';
                        if ($p['divisi'] == 'IT') $badgeColor = 'bg-primary';
                        if ($p['divisi'] == 'HR') $badgeColor = 'bg-danger';
                        if ($p['divisi'] == 'Marketing') $badgeColor = 'bg-warning text-dark';
                        if ($p['divisi'] == 'Produksi') $badgeColor = 'bg-success';
                        ?>
                        <span class="badge <?= $badgeColor ?> rounded-pill px-3 mt-2">
                            <?= esc($p['divisi']) ?>
                        </span>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>