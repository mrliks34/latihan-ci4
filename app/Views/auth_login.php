<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Ilkom C Malam Media</title>

    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=2070&auto=format&fit=crop');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            /* Font body modern */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-login {
            border: none;
            border-radius: 12px;
            /* Efek Kaca (Glassmorphism) dikit biar elegan */
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
            /* Font Khas Koran */
            font-size: 28px;
            letter-spacing: 1px;
            color: #1a1a1a;
            text-transform: uppercase;
            border-bottom: 3px double #1a1a1a;
            /* Garis ganda khas koran */
            display: inline-block;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        .btn-primary {
            background-color: #1a1a1a;
            /* Tombol Hitam Elegan */
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Form Floating Fix */
        .form-floating>label {
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger shadow-sm border-0 text-center">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>

                <div class="card card-login p-3">
                    <div class="card-header text-center">
                        <h3 class="newspaper-title">ILKOM C MEDIA</h3>
                        <p class="text-muted small fst-italic mt-2">"The Voice of Technology"</p>
                    </div>
                    <div class="card-body mt-2">
                        <form action="/login/auth" method="post">

                            <div class="form-floating mb-3">
                                <label for="floatingInput">Email Address</label>
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        👁️
                                    </button>
                                </div>
                            </div>

                            <script>
                                const togglePassword = document.querySelector('#togglePassword');
                                const password = document.querySelector('#password');

                                togglePassword.addEventListener('click', function(e) {
                                    // Toggle tipe input antara password dan text
                                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                    password.setAttribute('type', type);

                                    // Ganti ikon (opsional)
                                    this.textContent = type === 'password' ? '👁️' : '🙈';
                                });
                            </script>

                            <div class="text-center mb-3 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100 py-2">MASUK</button>
                            </div>
                        </form>

                        <div class="text-center mt-4 border-top pt-3">
                            <span class="text-muted small">Belum berlangganan?</span>
                            <a href="/register" class="text-decoration-none fw-bold text-dark">Daftar</a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 text-white small text-shadow">
                    &copy; 2025 Ilkom C Media Corp. <br> All Rights Reserved.
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>