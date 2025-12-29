<?= $this->extend('layout/admin/admin_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h3 class="mt-4">Riwayat Pendidikan</h3>

    <div class="card mb-4">
        <div class="card-header">
            <a href="/admin/education/create" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>
        <div class="card-body">
            <form action="" method="get" class="mb-3">
                <div class="row g-2">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="keyword" placeholder="Cari sekolah..." value="<?= $keyword ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select name="jenjang" class="form-select form-control">
                            <option value="">- Semua Jenjang -</option>
                            <option value="SD" <?= $jenjang == 'SD' ? 'selected' : '' ?>>SD</option>
                            <option value="SMP" <?= $jenjang == 'SMP' ? 'selected' : '' ?>>SMP</option>
                            <option value="SMA/SMK" <?= $jenjang == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK</option>
                            <option value="S1" <?= $jenjang == 'S1' ? 'selected' : '' ?>>S1 (Kuliah)</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-dark w-100" type="submit">Filter & Cari</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Jenjang</th>
                        <th>
                            <a href="?sort_by=nama_sekolah&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>&keyword=<?= $keyword ?>&jenjang=<?= $jenjang ?>" class="text-white text-decoration-none">
                                Nama Sekolah <i class="fas fa-sort float-end"></i>
                            </a>
                        </th>
                        <th>
                            <a href="?sort_by=tahun_lulus&order=<?= $order == 'ASC' ? 'DESC' : 'ASC' ?>&keyword=<?= $keyword ?>&jenjang=<?= $jenjang ?>" class="text-white text-decoration-none">
                                Tahun Lulus <i class="fas fa-sort float-end"></i>
                            </a>
                        </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($education as $e): ?>
                        <tr>
                            <td><span class="badge bg-secondary"><?= $e['jenjang']; ?></span></td>
                            <td><?= $e['nama_sekolah']; ?></td>
                            <td><?= $e['tahun_masuk']; ?> - <?= $e['tahun_lulus']; ?></td>
                            <td>
                                <a href="/admin/education/delete/<?= $e['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links('education', 'default_full'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>