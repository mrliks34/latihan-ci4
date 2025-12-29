<?= $this->extend('layout/admin/admin_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Data Aktivitas Harian</h3>

    <div class="card mb-4">
        <div class="card-header">
            <a href="/admin/activities/create" class="btn btn-primary btn-sm">+ Tambah</a>
        </div>
        <div class="card-body">
            <form action="" method="get" class="mb-3">
                <div class="row g-2">
                    <div class="col-md-3">
                        <label>Cari:</label>
                        <input type="text" class="form-control" name="keyword" placeholder="Nama aktivitas..." value="<?= $keyword ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Dari Tanggal:</label>
                        <input type="date" class="form-control" name="start_date" value="<?= $start_date ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Sampai Tanggal:</label>
                        <input type="date" class="form-control" name="end_date" value="<?= $end_date ?>">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-dark w-100" type="submit">Filter & Cari</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            <a href="?sort_by=tanggal&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                                Waktu <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>
                            <a href="?sort_by=nama_aktivitas&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>">
                                Aktivitas <i class="fas fa-sort"></i>
                            </a>
                        </th>
                        <th>Bukti</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activities as $a): ?>
                        <tr>
                            <td><?= $a['tanggal']; ?> <br> <small><?= $a['jam']; ?></small></td>
                            <td><?= $a['nama_aktivitas']; ?></td>
                            <td>
                                <?php if ($a['foto']): ?>
                                    <img src="/uploads/aktivitas/<?= $a['foto']; ?>" width="80">
                                <?php else: ?> - <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/activities/delete/<?= $a['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('activities', 'default_full'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>