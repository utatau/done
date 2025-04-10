<div class="container mt-4">
    <a data-toggle="modal" href="" data-target="#tambah" class="btn btn-sm btn-primary btn-icon-split">
        <span class="text text-white">Tambah Kategori</span>
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
    </a>
    <hr>

    <?php if (!empty($kategori)) : ?>
        <?php foreach ($kategori as $head_kategori => $sub_kategori) : ?>
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <strong><?= $head_kategori ?></strong>
                    <div>
                        <?php if (!empty($sub_kategori)) : ?>
                            <a href="#" onclick="ambilDataHi('<?= $head_kategori ?>')" data-target="#tambahsub" data-toggle="modal" class="btn btn-sm btn-success">Tambah</a>
                            <a href="#" onclick="ambilDataHead('<?= $head_kategori ?>')" data-target="#ubah" data-toggle="modal" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" onclick="konfirmasi('<?= $head_kategori ?>')" class="btn btn-sm btn-danger">Delete</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($sub_kategori)) : ?>
                        <?php foreach ($sub_kategori as $s) : ?>
                            <div class="border p-2 mb-2 d-flex justify-content-between align-items-center">
                                <?= $s->sub_kategori ?>
                                <div>
                                    <a href="#" onclick="konfirmasiSub('<?= $s->id_kategori ?>')" class="btn btn-sm btn-danger">Delete</a>
                                    <a href="#" onclick="ambilData('<?= $s->id_kategori ?>')" data-target="#ubahsub" data-toggle="modal" class="btn btn-sm btn-warning">Edit</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="text-center text-muted">Tidak ada kategori tersedia.</p>
    <?php endif; ?>
</div>

<!-- TAMBAH KATEGORI -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>kategori/proses_tambah" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="myModalLabel">Tambah Kategori</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="id_kategori" type="hidden">
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input class="form-control" name="head_kategori" type="text">
                    </div>
                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input class="form-control" name="kode_kategori" type="text">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- TAMBAH KATEGORI -->

<!-- tambah sub -->
<div class="modal fade" id="ubahsub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>kategori/proses_ubah_sub" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="myModalLabel">Ubah Sub Kategori</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="id_kategori" id="id_kategori" type="hidden">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="head_kategori" id="head_kategori" type="hidden">
                    </div>
                    <div class="form-group">
                        <label>Nama Sub Kategori</label>
                        <input class="form-control" name="sub_kategori" id="sub_kategori" type="text">
                    </div>
                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input class="form-control" name="kode_kategori" id="kode_kategori" type="text">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end ubah sub -->
<!-- tambah sub -->
<div class="modal fade" id="tambahsub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>kategori/proses_tambah_sub" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="myModalLabel">Tambah Sub Kategori</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" name="head_kategori" id="head_kategori" type="hidden">
                    </div>
                    <div class="form-group">
                        <label>Nama Sub Kategori</label>
                        <input class="form-control" name="sub_kategori" id="sub_kategori" type="text">
                    </div>
                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input class="form-control" name="kode_kategori" id="kode_kategori" type="text">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- end tambah sub -->
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>kategori/proses_ubah" name="myFormUpdate" method="POST"
        onsubmit="return validateFormUpdate()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="myModalLabel">Ubah Kategori</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <div class="form-group"><label>Nama Kategori</label>
                        <input class="form-control" name="head_kategori" id="head_kategori" type="text">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text text-white">Simpan Perubahan</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text text-white">Batal</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


</div>
<script>
    $('.chosen').chosen({
        width: '100%',

    });
</script>
<script src="<?= base_url(); ?>assets/js/kategori.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<?php if ($this->session->flashdata('Pesan')): ?>
    <?= $this->session->flashdata('Pesan') ?>
<?php else: ?>
    <script>
        $(document).ready(function() {
            let timerInterval
            Swal.fire({
                title: 'Memuat...',
                timer: 1000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {

            })
        });
    </script>
<?php endif; ?>