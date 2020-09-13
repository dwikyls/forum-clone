<?= $this->extend('layout/template2'); ?>

<?= $this->section('content'); ?>
<div class="container mt-1">
    <div class="row">
        <div class="col">
            <a href="/Home" class="btn btn-warning text-white">Kembali</a>
        </div>
    </div>
</div>

<div class="container mt-4">
    <?php foreach ($diskusi as $d) : ?>
        <div class="row p-1">
            <div class="col-2">
                <img src="/assets/img/<?= $d['foto']; ?>" class="img-thumbnail rounded-circle border-warning" width="120px">
            </div>
            <div class="col-8 text-justify">
                <div class="row">
                    <b><?= $d['nama']; ?></b>
                    <b class="text-warning ml-3"><?= $d['created_at']; ?></b>
                </div>
                <div class="row">
                    <?= $d['judul']; ?>
                </div><br>
                <div class="row">
                    <?= $d['deskripsi']; ?>
                </div><br>
                <div class="row"><b><?= $d['jml_komentar']; ?> Jawaban</b></div>
                <form action="/Home/komentar" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="target_post" id="target_post" value="<?= $d['id_post']; ?>">
                    <input type="hidden" name="user_id" id="user_id" value="2">
                    <div class="row bg-light">
                        <div class="modal-body">
                            <div class="row bg-light">
                                <textarea name="deskripsi" id="deskripsi" class="form-control bg-transparent border-0" placeholder="Deskripsi disini..."></textarea>
                                <div class="custom-file border-0 bg-transparent">
                                    <input name="berkas" type="file" class="custom-file-input border-0 bg-transparent" id="berkas">
                                    <label class="custom-file-label border-0 bg-transparent" for="berkas">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                                        </svg>
                                        <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V13a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-1zm5-6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Komentar</button>
                </form><br>
                <?php foreach ($komen as $k) : ?>
                    <div class="row shadow p-1 mt-4 rounded">
                        <div class="col-2">
                            <img src="/assets/img/<?= $k['foto']; ?>" class="img-thumbnail rounded-circle border-warning" width="120px">
                        </div>
                        <div class="col-8 text-justify">
                            <div class="row">
                                <b><?= $k['nama']; ?></b>
                                <b class="text-warning ml-3"><?= $k['created_at']; ?></b>
                            </div>
                            <div class="row">
                                <?= $k['deskripsi']; ?>
                            </div>
                            <div class="row">
                                <div class="col"><?= $k['berkas']; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>