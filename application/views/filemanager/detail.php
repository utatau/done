<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>filemanager" class="btn btn-md btn-circle btn-secondary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Dokumen</h1>
        </div>
    </div>

    <?php foreach ($dokumen as $d): ?>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-12 mb-4">
                <div class="card shadow border-bottom-secondary mb-4">
                    <div class="card-body d-sm-flex">
                        <div class="col-lg-3">
                            <iframe width="1200px" height="600px"
                                src="<?= base_url() ?>assets/upload/dokumen/<?= $d->file ?>" alt="">
                        </div>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>

        </div>
</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<?php if ($this->session->flashdata('Pesan')): ?>

<?php else: ?>
    <script>
        $(document).ready(function() {

            $('#pdf').hide();

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