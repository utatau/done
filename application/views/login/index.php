<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-xl-6 col-lg-8">
        <div class="card o-hidden border-0 shadow-lg my-3 py-3">
            <div class="card-body p-5">
                <div class="text-center">
                    <img width="150px" src="<?= base_url() ?>assets/icon/logo.png" alt="">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="user" name="user" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user"
                            id="pwd" name="pwd" placeholder="Password">
                    </div>
                    <hr>
                    <a href="#" onclick="proses_login()" id="login"
                        class="btn btn-primary btn-user btn-block shadow">
                        Login
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/css/sb-admin-biru.css"></script>
<?php if ($this->session->flashdata('Pesan')): ?>
    <?= $this->session->flashdata('Pesan'); ?>
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