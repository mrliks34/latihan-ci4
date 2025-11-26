<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Nexus Portal</title>

    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
        body {

            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;

        }

        .card-login {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
            padding-top: 30px;
        }

        .btn-success {
            background-color: #1e3c72;
            border: none;
        }

        .btn-success:hover {
            background-color: #2a5298;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5"> <?php if (isset($validation)): ?>
                    <div class="alert alert-danger shadow-sm border-0">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <div class="card card-login p-3">
                    <div class="card-header text-center">
                        <h3 class="fw-bold text-primary">BUAT AKUN BARU</h3>
                        <p class="text-muted small">Join Ilkom C Media Team</p>
                    </div>
                    <div class="card-body">
                        <form action="/register/save" method="post">
                            <div class="form-floating mb-3">
                                <label for="floatingName">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="floatingName" placeholder="Nama Lengkap" value="<?= set_value('name') ?>" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="floatingEmail">Email Address</label>
                                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="<?= set_value('email') ?>" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="floatingPass">Password</label>
                                <input type="password" name="password" class="form-control" id="floatingPass" placeholder="Password" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="floatingConfPass">Ulangi Password</label>
                                <input type="password" name="confpassword" class="form-control" id="floatingConfPass" placeholder="Confirm Password" required>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success btn-lg px-5">Daftar Sekarang</button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <span class="text-muted small">Sudah punya akun?</span>
                            <a href="/login" class="text-decoration-none fw-bold text-primary">Login disini</a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 text-white-50 small">
                    &copy; 2025 Nexus Media Corp.
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>