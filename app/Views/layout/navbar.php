<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="<?= base_url('/') ?>">
            ILKOM C MEDIA
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pegawai') ?>">Tim Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about') ?>">Tentang Kami</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (session()->get('logged_in')): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hai, <?= esc(session()->get('user_name')) ?>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">

                            <?php if (session()->get('user_role') == 'admin'): ?>
                                <a class="dropdown-item" href="<?= base_url('admin/news') ?>">🔥 Masuk Dashboard</a>
                                <div class="dropdown-divider"></div>
                            <?php endif; ?>

                            <a class="dropdown-item" href="<?= base_url('profile') ?>">👤 Profil Saya</a>
                            <a class="dropdown-item text-danger font-weight-bold" href="<?= base_url('logout') ?>">
                                🚪 Logout
                            </a>
                        </div>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="btn btn-warning text-dark font-weight-bold px-4 rounded-pill" href="<?= base_url('login') ?>">
                            Login
                        </a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>