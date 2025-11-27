<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url() ?>">Ilkom C Malam</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('news') ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about') ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('contact') ?>">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (session()->get('logged_in')): ?>
                    <li class="nav-item">
                        <span class="nav-link text-white">
                            Hai, <strong><?= session()->get('user_name') ?></strong>
                        </span>
                    </li>
                    <li class="nav-item pl-2">
                        <a class="btn btn-danger btn-sm mt-1" href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-light btn-sm text-primary mt-1 fw-bold" href="<?= base_url('login') ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>