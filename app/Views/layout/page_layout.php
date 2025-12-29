<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita & Portofolio</title>

    <link rel="shortcut icon" type="image/png" href="<?= base_url('logo.png') ?>">

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
            border-radius: 0 0 30px 30px;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>

    <?= $this->include('layout/navbar') ?>

    <div style="min-height: 80vh;">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('layout/footer') ?>

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>