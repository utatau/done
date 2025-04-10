<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row d-flex justify-content-around">
        <div class="col-xl-3 col-12 col-md-6 mb-4" id="dokumen">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Dokumen
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlDokumen ?> Dokumen</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4 " id="kategori">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Kategori
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlKategori ?> Kategori</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 mt-5 col-lg-4 mx-auto">
            <div class="card shadow mb-4" id="grafikpie">
                <div class="card-body">
                    <div class="chart-area" id="chartpie">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <span class="badge badge-success" id="dm"></span> Total Dokumen
                        </span>
                        <span class="mr-2">
                            <span class="badge badge-danger" id="kt"></span> Total Kategori
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/chart/pie-chart.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

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
                $("#dokumen").addClass("bounceIn");
                $("#kategori").addClass("bounceIn");
                $("#user").addClass("bounceIn");
                $("#grafik").addClass("bounceIn");
                $("#grafikpie").addClass("bounceIn");
                $("#dmterakhir").addClass("bounceIn");
                $("#kterakhir").addClass("bounceIn");
            })
        });
    </script>
<?php endif; ?>