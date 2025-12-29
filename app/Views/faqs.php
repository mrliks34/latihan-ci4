<?= $this->extend('/layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
    <div class="container">
        <h1 class="font-weight-bold text-white">F.A.Q</h1>
        <p class="lead text-white-50">Pertanyaan yang sering ditanyakan kepada kami.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="accordion" id="faqAccordion">
                <?php $i = 1;
                foreach ($data_faqs as $faq) : ?>
                    <div class="card shadow-sm mb-3 border-0">
                        <div class="card-header bg-white border-0 p-3" id="heading<?= $i ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left font-weight-bold text-dark d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true">
                                    <span><i class="far fa-question-circle text-primary mr-2"></i> <?= $faq['question'] ?></span>
                                    <i class="fas fa-chevron-down small text-muted"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse<?= $i ?>" class="collapse" aria-labelledby="heading<?= $i ?>" data-parent="#faqAccordion">
                            <div class="card-body text-muted border-top">
                                <?= $faq['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>
            </div>

            <?php if (empty($data_faqs)): ?>
                <div class="text-center py-5">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/searching-not-found-illustration-download-in-svg-png-gif-file-formats--404-error-page-result-pack-design-development-illustrations-4357285.png" width="200">
                    <h5 class="text-muted mt-3">Belum ada FAQ tersedia.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>