<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top <?= $navbarColor ?? 'bg-primary' ?>"
    style="<?= isset($navbarStyle) ? $navbarStyle : '' ?>">

    <div class="container">
        <a class="navbar-brand font-weight-bold" href="<?= base_url('/') ?>">
            <i class="fas fa-code mr-2"></i>ILKOM C MEDIA
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" role="button" data-toggle="dropdown">
                        Portofolio
                    </a>
                    <div class="dropdown-menu shadow border-0">
                        <a class="dropdown-item" href="<?= base_url('activities') ?>"><i class="fas fa-calendar-alt mr-2 text-primary"></i> Aktivitas</a>
                        <a class="dropdown-item" href="<?= base_url('education') ?>"><i class="fas fa-graduation-cap mr-2 text-success"></i> Pendidikan</a>
                        <a class="dropdown-item" href="<?= base_url('biodata') ?>"><i class="fas fa-user-circle mr-2 text-info"></i> Biodata</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pegawai') ?>">Tim Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about') ?>">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('contact') ?>">Kontak</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (session()->get('logged_in')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active font-weight-bold" href="#" role="button" data-toggle="dropdown">
                            Hai, <?= esc(session()->get('user_name')) ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow border-0">
                            <?php if (session()->get('user_role') == 'admin'): ?>
                                <a class="dropdown-item" href="<?= base_url('admin/news') ?>">🔥 Masuk Dashboard</a>
                            <?php endif; ?>
                            <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">🚪 Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-warning text-dark font-weight-bold px-4 rounded-pill shadow-sm" href="<?= base_url('login') ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>