<?php
function formatuta($tanggal)
{
    if ($tanggal == "9999-12-31") {
        return "Seumur Hidup";
    }
    $tanggalSekarang = new DateTime();

    $tanggalKedaluwarsa = new DateTime($tanggal);

    if ($tanggalKedaluwarsa < $tanggalSekarang) {
        return "expired";
    }
    $selisihTahun = $tanggalKedaluwarsa->format("Y") - $tanggalSekarang->format("Y");

    return $selisihTahun . " Tahun";
}
?>


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
            <a data-toggle="modal" href="" data-target="#tambah" class="btn btn-sm btn-primary btn-icon-split">
                <span class="text text-white">Tambah Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
            </a>

        <?php endif; ?>
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
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $no++ ?>.</td>
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $d->kode_rak ?></td>
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $d->nama_tenaga_krj ?></td>
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $d->kpj ?></td>
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $d->sub_kategori ?></td>
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $d->tgl_upload ?></td>
                                    <td onclick="('<?= $d->id_dokumen ?>')">
                                        <?= formatuta($d->masa_berlaku) ?>
                                    </td>
                                    <td onclick="('<?= $d->id_dokumen ?>')"><?= $d->file ?></td>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'admin'): ?>
                                        <td>
                                            <center>
                                                <a href="" onclick="ambilData('<?= $d->id_dokumen ?>')" data-target="#ubah" data-toggle="modal"
                                                    class="btn btn-circle btn-success btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" onclick="konfirmasi('<?= $d->id_dokumen ?>')"
                                                    class="btn btn-circle btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
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


<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>dokumen/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="myModalLabel">Tambah Dokumen</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Rak</label>
                        <input class="form-control" name="kode_rak" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nama Tenaga Kerja</label>
                        <input class="form-control" name="nama_tenaga_krj" type="text">
                    </div>
                    <div class="form-group">
                        <label>KPJ</label>
                        <input class="form-control" name="kpj"></input>
                    </div>
                    <?php if ($jmlKategori > 0): ?>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control chosen">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->sub_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label>Kategori Dokumen</label>
                            <input type="hidden" name="kategori">
                            <div class="d-sm-flex justify-content-between">
                                <span class="text-danger"><i>(Belum Ada Sub Kategori!)</i></span>
                                <a href="<?= base_url() ?>kategori" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Tanggal Upload</label>
                        <input class="form-control" type="date" name="tgl_upload">
                    </div>
                    <div class="form-group">
                        <label>Masa Berlaku</label>
                        <select class="form-control" name="#" id="uta">
                            <option value="1">1 Tahun</option>
                            <option value="2">2 Tahun</option>
                            <option value="3">3 Tahun</option>
                            <option value="4">4 Tahun</option>
                            <option value="5">5 Tahun</option>
                            <option value="lifetime">Seumur Hidup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="masa_berlaku" id="masa_berlaku" readonly>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input class="form-control" type="file" id="GetFile" name="dokumen" accept=".xlsx,.pdf">
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

<!-- form ubah -->
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>dokumen/proses_ubah" name="myFormUpdate" method="POST"
        onsubmit="return validateFormUpdate()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="myModalLabel">Ubah dokumen</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <div class="form-group"><label>ID dokumen</label>
                        <input class="form-control" name="id_dokumen" type="text" id="id_dokumen" readonly>
                    </div>

                    <div class="form-group"><label>Kode Rak</label>
                        <input class="form-control" name="kode_rak" type="text" id="kode_rak">
                    </div>

                    <div class="form-group"><label>Nama Tenaga Kerja</label>
                        <input class="form-control" name="nama_tenaga_krj" type="text" id="nama_tenaga_krj">
                    </div>

                    <div class="form-group"><label>KPJ</label>
                        <input class="form-control" name="kpj" id="kpj"></input>
                    </div>
                    <?php if ($jmlKategori > 0): ?>
                        <div class="form-group"><label>Kategori</label>
                            <select name="kategori" class="form-control chosen">
                                <?php foreach ($kategori as $d): ?>
                                    <?php if ($d->id_kategori == $d->id_kategori): ?>
                                        <option value="<?= $d->id_kategori ?>" selected><?= $d->sub_kategori ?></option>
                                    <?php else: ?>
                                        <option value="<?= $d->id_kategori ?>"><?= $d->sub_kategori ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <div class="form-group"><label>Kategori</label>
                            <input type="hidden" name="kategori">
                            <div class="d-sm-flex justify-content-between">
                                <span class="text-danger"><i>(Belum Ada Data kategori!)</i></span>
                                <a href="<?= base_url() ?>kategori" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group"><label>Tanggal Upload</label>
                        <input class="form-control" name="tgl_upload" id="tgl_upload"></input>
                    </div>
                    <div class="form-group">
                        <label>Tambah Masa Berlaku</label>
                        <select class="form-control" name="perpanjang" id="perpanjang">
                            <option value="1">1 Tahun</option>
                            <option value="2">2 Tahun</option>
                            <option value="3">3 Tahun</option>
                            <option value="4">4 Tahun</option>
                            <option value="5">5 Tahun</option>
                            <option value="lifetime">Seumur Hidup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="tambah_masa_berlaku" id="tambah_masa_berlaku" type="hidden" readonly>
                    </div>
                    <div class="form-group"><label>File</label>
                        <input class="form-control" name="fileLama" id="fileLama"></input>
                    </div>

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
    </form>
</div>



<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dokumen.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formdokumen.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
    $('.chosen').chosen({
        width: '100%',

    });
</script>
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
<script>
    document.getElementById("uta").addEventListener("change", function() {
        let tahun = this.value;
        let today = new Date();
        let uta;

        if (tahun === "lifetime") {
            uta = "9999-12-31";
        } else {
            today.setFullYear(today.getFullYear() + parseInt(tahun));
            today.setDate(today.getDate() - 1);
            uta = today.toISOString().split('T')[0];
        }

        document.getElementById("masa_berlaku").value = uta;
    });
</script>
<script>
    document.getElementById("perpanjang").addEventListener("change", function() {
        let tahun = this.value;
        let today = new Date();
        let perpanjang;

        if (tahun === "lifetime") {
            perpanjang = "9999-12-31";
        } else {
            today.setFullYear(today.getFullYear() + parseInt(tahun));
            today.setDate(today.getDate() - 1);
            perpanjang = today.toISOString().split('T')[0];
        }

        document.getElementById("tambah_masa_berlaku").value = perpanjang;
    });
</script>