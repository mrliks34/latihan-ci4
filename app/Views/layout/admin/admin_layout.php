<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ILKOM C MALAM</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('logo.png') ?>">
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background: #ffffff;
            min-height: 100vh;
            border-right: 1px solid #e9ecef;
            width: 250px;
            position: fixed;
        }

        .sidebar .nav-link {
            color: #6c757d;
            padding: 12px 20px;
            font-weight: 500;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #f0f4ff;
            /* Biru muda sekali */
            color: #0d6efd;
            /* Biru Primary */
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="sidebar p-3 d-flex flex-column">
        <h4 class="fw-bold text-primary mb-4 px-2">ILKOM C ADMIN</h4>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'admin/news') ? 'active' : '' ?>" href="<?= base_url('admin/news') ?>">
                    📰 Berita
                </a>
            </li>

            <li class="nav-item my-2 text-uppercase small text-muted px-2 fw-bold">Data Master</li>

            <li class="nav-item">
                <a class="nav-link <?= (strpos(uri_string(), 'admin/pegawai') !== false) ? 'active' : '' ?>" href="<?= base_url('admin/pegawai') ?>">
                    👥 Data Pegawai
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= (strpos(uri_string(), 'admin/users') !== false) ? 'active' : '' ?>" href="<?= base_url('admin/users') ?>">
                    🔑 Akun User
                </a>
            </li>
        </ul>

        <div class="mt-auto">
            <a href="<?= base_url('news') ?>" target="_blank" class="btn btn-outline-secondary w-100 mb-2">Lihat Website</a>
        </div>
    </div>

    <div class="main-content p-0">
        <div class="top-navbar sticky-top">
            <h5 class="m-0 text-muted">Halo, <strong><?= session()->get('user_name') ?></strong></h5>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm px-4">Logout</a>
        </div>

        <div class="p-4">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>