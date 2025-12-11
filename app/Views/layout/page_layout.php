<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Codeigniter</title>

    <link rel="shortcut icon" type="image/png" href="<?= base_url('logo.png') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
</head>

<body>

    <?= $this->include('layout/navbar') ?>
    <?= $this->include('layout/header') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/footer') ?>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>