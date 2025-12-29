<?= $this->extend('layout/admin/admin_layout'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4 mt-4">
    <div class="card"><div class="card-header">Form Pendidikan</div><div class="card-body">
        <form action="/admin/education/store" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3"><label>Jenjang</label>
                <select name="jenjang" class="form-control">
                    <option value="SD">SD</option><option value="SMP">SMP</option><option value="SMA/SMK">SMA/SMK</option><option value="S1">S1 (Kuliah)</option>
                </select>
            </div>
            <div class="mb-3"><label>Nama Sekolah/Kampus</label><input type="text" name="nama_sekolah" class="form-control" required></div>
            <div class="row">
                <div class="col"><label>Tahun Masuk</label><input type="number" name="tahun_masuk" class="form-control"></div>
                <div class="col"><label>Tahun Lulus</label><input type="number" name="tahun_lulus" class="form-control"></div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Simpan</button>
        </form>
    </div></div>
</div>
<?= $this->endSection(); ?>