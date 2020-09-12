<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php foreach ($diskusi as $d) : ?>
        <div class="row shadow p-1 mt-4 rounded">
            <div class="col-2">
                <img src="<?= $d['foto']; ?>" class="img-thumbnail rounded-circle border-warning" width="120px">
            </div>
            <div class="col-8 text-justify">
                <div class="row">
                    <b><?= $d['nama']; ?></b>
                    <b class="text-warning ml-3"><?= $d['created_at']; ?></b>
                </div>
                <div class="row">
                    <?= $d['judul']; ?>
                </div>
            </div>
            <div class="col-2 text-center pt-4">
                <a href="/Home/detail/<?= $d['id_post']; ?>" class="text-warning">
                    <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-chat-left-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                    </svg>
                </a>
                <b><?= $d['jml_komentar']; ?></b>
            </div>
            <div class="row">
                <div class="col"><?= $d['berkas']; ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>