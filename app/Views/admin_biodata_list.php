<?= $this->extend('layout/admin/admin_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Data Biodata</h3>

    <div class="card mb-4">
        <div class="card-header">
            <a href="/admin/biodata/create" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>
        <div class="card-body">
            <form action="" method="get" class="mb-3 row g-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari nama atau email..." value="<?= $keyword ?>">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark w-100" type="submit">Cari</button>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>
                            <a href="?sort_by=nama_lengkap&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>&keyword=<?= $keyword ?>" class="text-white text-decoration-none">
                                Nama Lengkap <i class="fas fa-sort float-end"></i>
                            </a>
                        </th>
                        <th>Email / HP</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($biodata as $b): ?>
                        <tr>
                            <td><?= $b['nama_lengkap']; ?></td>
                            <td>
                                <?= $b['email']; ?> <br>
                                <small class="text-muted"><?= $b['no_hp']; ?></small>
                            </td>
                            <td><?= $b['alamat']; ?></td>
                            <td>
                                <?php if ($b['foto_profil']): ?>
                                    <img src="/uploads/biodata/<?= $b['foto_profil']; ?>" width="50" class="rounded-circle">
                                <?php else: ?> - <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/biodata/delete/<?= $b['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links('biodata', 'default_full'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>