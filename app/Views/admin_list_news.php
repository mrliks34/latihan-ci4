<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h3 fw-bold text-dark">Dashboard Overview</h2>
        <p class="text-muted">Selamat datang kembali, Admin!</p>
    </div>
    <a href="<?= base_url('admin/news/create') ?>" class="btn btn-primary shadow-sm">
        + Buat Berita Baru
    </a>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-white bg-primary h-100">
            <div class="card-body">
                <h6 class="text-uppercase mb-2">Total Berita</h6>
                <h2 class="display-6 fw-bold"><?= count($newses) ?></h2>
                <small>Artikel tersimpan di database</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-white bg-success h-100">
            <div class="card-body">
                <h6 class="text-uppercase mb-2">Status Server</h6>
                <h2 class="display-6 fw-bold">Online</h2>
                <small>Koneksi Database Stabil</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-white h-100">
            <div class="card-body">
                <h6 class="text-uppercase mb-2 text-muted">Aktivitas</h6>
                <p class="mb-0 text-muted">Login sebagai <span class="fw-bold text-dark">Super Admin</span></p>
                <small class="text-primary">Kelola sistem dengan bijak.</small>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel Terbaru</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="py-3 ps-4">Judul Artikel</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($newses as $news): ?>
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold text-dark d-block"><?= esc($news['title']) ?></span>
                                <small class="text-muted">ID: #<?= $news['id'] ?></small>
                            </td>
                            <td>
                                <?php if ($news['status'] === 'published'): ?>
                                    <span class="badge bg-success rounded-pill px-3">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary rounded-pill px-3">Draft</span>
                                <?php endif ?>
                            </td>
                            <td class="text-muted small">
                                <?= $news['created_at'] ?>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('admin/news/' . $news['id'] . '/preview') ?>" class="btn btn-outline-primary" target="_blank" title="Preview">👁️</a>
                                    <a href="<?= base_url('admin/news/' . $news['id'] . '/edit') ?>" class="btn btn-outline-warning" title="Edit">✏️</a>
                                    <a href="#" data-href="<?= base_url('admin/news/' . $news['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-outline-danger" title="Hapus">🗑️</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <h4 class="text-danger fw-bold">Hapus Data?</h4>
                <p class="text-muted">Data yang dihapus tidak dapat dikembalikan lagi.</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Batal</button>
                    <a href="#" role="button" id="delete-button" class="btn btn-danger px-4">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>

<?= $this->endSection() ?>