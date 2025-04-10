$(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');

});

function ambilData(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'dokumen/getData';
    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#id_dokumen').val(hasil[0].id_dokumen);
            $('#kode_rak').val(hasil[0].kode_rak);
            $('#nama_tenaga_krj').val(hasil[0].nama_tenaga_krj);
            $('#kpj').val(hasil[0].kpj);
            $('#kategori').val(hasil[0].kategori);
            $('#tgl_upload').val(hasil[0].tgl_upload);
            $('#masa_berlaku').val(hasil[0].masa_berlaku);
            $('#fileLama').val(hasil[0].file);
        }
    });
}

function konfirmasi(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Memuat...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 1000,
                showConfirmButton: false,
            }).then(
                function () {
                    window.location.href = base_url + "dokumen/proses_hapus/" + id;
                }
            );
        }
    });


}