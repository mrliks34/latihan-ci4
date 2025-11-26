<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
	<div class="jumbotron bg-primary text-white p-5 rounded">
		<h1>Selamat Datang di Portal Berita</h1>
		<p>Project Kelompok CodeIgniter 4</p>
		<a class="btn btn-light btn-lg" href="<?= base_url('news') ?>" role="button">Baca Berita</a>
	</div>
</div>
<?= $this->endSection() ?>