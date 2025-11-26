<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Portal Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>

                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Login System</h4>
                    </div>
                    <div class="card-body">
                        <form action="/login/auth" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            Belum punya akun? <a href="/register">Daftar disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>