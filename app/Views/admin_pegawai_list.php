<?= $this->extend('layout/admin/admin_layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Pegawai</h3>
    <a href="<?= base_url('admin/pegawai/create') ?>" class="btn btn-primary">+ Tambah Pegawai</a>
</div>

<?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Gender</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pegawai as $p): ?>
                    <tr>
                        <td>
                            <img src="<?= base_url('uploads/' . $p['foto_pegawai']) ?>" width="50" height="50" class="rounded-circle object-fit-cover">
                        </td>
                        <td><?= $p['nama_pegawai'] ?></td>
                        <td><?= $p['tanggal_lahir'] ?></td>
                        <td><?= $p['jenis_kelamin'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/pegawai/edit/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('admin/pegawai/delete/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>