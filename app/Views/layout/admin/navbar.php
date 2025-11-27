<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('admin/news') ?>">Admin Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/news') ?>">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/users') ?>">Manajemen User</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('news') ?>" target="_blank">Lihat Website</a>
                </li>
            </ul>
        </div>
    </div>
</nav>