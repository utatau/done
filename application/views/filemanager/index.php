<div class="container-fluid">
    <!-- <h1 class="h3 mb-0 text-gray-800">Data Dokumen Masuk</h1> -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <span class="text-white-50 p-3">
            <input type="date" name="cekout" class="form-control shadow-none">
        </span>
    </div>

    <div class="col-lg-12 mb-4" id="container">
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Kode Rak</th>
                                <th>Nama Tenaga Kerja</th>
                                <th>KPJ</th>
                                <th>Kategori</th>
                                <th>Tanggal Upload</th>
                                <th>Masa Berlaku</th>
                                <th>File</th>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'staff'): ?>
                                    <th width="1%">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody">
                            <?php $no = 1;
                            foreach ($dokumen as $d): ?>
                                <tr>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $no++ ?>.</td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->kode_rak ?></td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->nama_tenaga_krj ?></td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->kpj ?></td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->id_kategori ?></td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->tgl_upload ?></td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->masa_berlaku ?></td>
                                    <td onclick="'<?= $d->id_dokumen ?>'"><?= $d->file ?></td>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'staff'): ?>
                                        <td>
                                            <center>
                                                <a href="#" onclick="detail('<?= $d->id_dokumen ?>')" class="btn btn-sm text-white-50">
                                                    <button class="form-control shadow-none">
                                                        Detail
                                                    </button>
                                                </a>
                                            </center>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/filemanager.js"></script>
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