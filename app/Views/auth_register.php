<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Ilkom C Media</title>

    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body {
            /* BACKGROUND KORAN (Sama seperti Login) */
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=2070&auto=format&fit=crop');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
            /* Jarak atas bawah biar enak dilihat pas scroll */
        }

        .card-login {
            border: none;
            border-radius: 12px;
            /* Efek Kaca (Glassmorphism) */
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 2px solid #f0f0f0;
            padding-top: 30px;
            padding-bottom: 20px;
        }

        /* Styling Judul Koran */
        .newspaper-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            letter-spacing: 1px;
            color: #1a1a1a;
            text-transform: uppercase;
            border-bottom: 3px double #1a1a1a;
            display: inline-block;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        /* Tombol Hitam Elegan (Ganti dari btn-success jadi custom) */
        .btn-primary {
            background-color: #1a1a1a;
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Fix Z-Index Form Floating */
        .form-floating>label {
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger shadow-sm border-0 text-center">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <div class="card card-login p-3">
                    <div class="card-header text-center">
                        <h3 class="newspaper-title">ILKOM C MEDIA</h3>
                        <p class="text-muted small fst-italic mt-2">"Join US"</p>
                    </div>
                    <div class="card-body mt-2">
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

                            <div class="text-center mb-3 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100 py-2">DAFTAR SEKARANG</button>
                            </div>
                        </form>

                        <div class="text-center mt-4 border-top pt-3">
                            <span class="text-muted small">Sudah punya akun?</span>
                            <a href="/login" class="text-decoration-none fw-bold text-dark">Login disini</a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 text-white small text-shadow">
                    &copy; Ilkom C Media Team 2025
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>