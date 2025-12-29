<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
    <div class="container">
        <h1 class="font-weight-bold text-white">Hubungi Kami</h1>
        <p class="lead text-white-50">Kami siap mendengar kritik, saran, atau pertanyaan Anda.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100 bg-primary text-white border-0">
                <div class="card-body p-5">
                    <h3 class="font-weight-bold mb-4">
                        Hello
                        <?php if (session()->get('logged_in')): ?>
                            <?= esc(session()->get('user_name')) ?>!
                        <?php else: ?>
                            Kawan!
                        <?php endif; ?>
                    </h3>
                    <p class="mb-5">Jangan ragu untuk menghubungi kami melalui formulir di samping atau kontak di bawah ini.</p>

                    <div class="mb-4">
                        <h6 class="text-white-50 text-uppercase small font-weight-bold">Alamat</h6>
                        <p><i class="fas fa-map-marker-alt mr-2"></i> Gedung ILKOM C, Universitas YM</p>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-white-50 text-uppercase small font-weight-bold">Email</h6>
                        <p><i class="fas fa-envelope mr-2"></i> admin@ilkomc-media.com</p>
                    </div>

                    <div>
                        <h6 class="text-white-50 text-uppercase small font-weight-bold">Telepon</h6>
                        <p><i class="fas fa-phone mr-2"></i> +62 812-3456-7890</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 mb-4">
            <div class="card shadow border-0 h-100">
                <div class="card-body p-5">
                    <h4 class="font-weight-bold mb-4 text-dark">Kirim Pesan</h4>
                    <form action="" class="form">
                        <div class="form-group">
                            <label for="email" class="font-weight-bold small text-muted">Email Anda</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-at text-muted"></i></span>
                                </div>
                                <input type="email" class="form-control bg-light border-0" placeholder="nama@email.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="font-weight-bold small text-muted">Pesan</label>
                            <textarea name="message" class="form-control bg-light border-0" rows="6" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill font-weight-bold shadow-sm">
                                <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>