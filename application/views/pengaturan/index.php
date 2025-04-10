<div class="container-fluid">
    <?php foreach ($user as $u): ?>
        <form action="<?= base_url() ?>pengaturan/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-sm-flex">
                    <!-- <a href="<?= base_url() ?>home" class="btn btn-md btn-circle btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                    </a> -->
                    &nbsp;
                    <h1 class="h2 mb-0 text-gray-800">Ganti Password</h1>
                </div>

            </div>

            <div class="d-sm-flex  justify-content-between mb-0">
                <div class="col-lg-8 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <input name="pwdLama" type="hidden" name="iduser" value="<?= $u->password ?>">
                                <input name="user" type="hidden" name="user" value="<?= $u->username ?>">
                                <input name="iduser" type="hidden" value="<?= $u->id_user ?>">
                                <div class="form-group"><label>Password</label>
                                    <input class="form-control" name="pwd" type="password" value="">
                                </div>
                                <div class="form-group"><label>Konfirmasi Password</label>
                                    <input class="form-control" name="kpwd" type="password" value="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-md btn-icon-split">
                                <span class="text text-white">Cancel</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-cancel"></i>
                                </span>
                            </button>
                            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                                <span class="text text-white">Save</span>
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
</div>
</div>

<?php endforeach; ?>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengaturan.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formuser.js"></script>

<?php if ($this->session->flashdata('Pesan')): ?>

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
                $("#profil").addClass("bounceIn");
            })
        });
    </script>
<?php endif; ?>