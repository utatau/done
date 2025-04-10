$(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');

});
function ambilData(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'kategori/getData';
    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#id_kategori').val(hasil[0].id_kategori);
            $('#head_kategori').val(hasil[0].head_kategori);
            $('#sub_kategori').val(hasil[0].sub_kategori);
            $('#kode_kategori').val(hasil[0].kode_kategori);
        }
    });
}
function ambilDataHi(head_kategori) {
    console.log("Head Kategori yang dikirim:", head_kategori);

    $('#tambahsub input[name="head_kategori"]').val(head_kategori);
}
function ambilDataHead(head_kategori) {
    console.log("Head Kategori yang dikirim:", head_kategori);

    $('#ubah input[name="head_kategori"]').val(head_kategori);
}

function ambilDataH(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'kategori/getData';
    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#id_kategori').val(hasil[0].id_kategori);
            $('#head_kategori').val(hasil[0].head_kategori);
            $('#sub_kategori').val(hasil[0].sub_kategori);
            $('#kode_kategori').val(hasil[0].kode_kategori);
        }
    });
}
function konfirmasiSub(id) {
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
                    window.location.href = base_url + "kategori/proses_hapus_sub/" + id;
                }
            );
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
                    window.location.href = base_url + "kategori/proses_hapus/" + id;
                }
            );
        }
    });
}