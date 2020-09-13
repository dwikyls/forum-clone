<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target="#exampleModal">Tambah Diskusi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-light">...</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 bg-light" type="search" placeholder="Cari...">
            </form>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    Filter By
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Diskusi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/Home/create" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user['id']; ?>">
                        <div class="modal-body">
                            <div class="row bg-light p-1 m-2">
                                <input type="text" name="judul" id="judul" class="bg-transparent border-0" placeholder="Tulis judul diskusi disini...">
                            </div>
                            <div class="row bg-light p-1 m-2">
                                <div class="custom-file border-0 bg-transparent">
                                    <input name="berkas" type="file" class="custom-file-input border-0 bg-transparent" id="file">
                                    <label class="custom-file-label border-0 bg-transparent" for="file">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                                        </svg>
                                        <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V13a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-1zm5-6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </label>
                                </div>
                                <textarea name="deskripsi" id="deskripsi" class="form-control bg-transparent border-0" placeholder="Deskripsi disini..."></textarea>
                            </div>
                            <div class="row bg-light p-1 m-2">
                                <select class="custom-select border-0 bg-transparent" id="kategori" name="kategori">
                                    <option selected>Kategori</option>
                                    <option value="Jalan Tol">Jalan Tol</option>
                                    <option value="Jembatan">Jembatan</option>
                                    <option value="Underpass">Underpass</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>