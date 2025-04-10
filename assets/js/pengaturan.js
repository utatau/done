$(document).ready(function () {
    ambilData();
});

function ambilData() {
    var id = $("[name='iduser']").val();
    var link = $('#baseurl').val();
    var base_url = link + 'pengaturan/detail_data';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $("#namaL").text(hasil[0].nama);
            $("#level").text(hasil[0].level);
        }
    });
}


function pesan(judul, deskripsi, status) {
    swal.fire({
        title: judul,
        text: deskripsi,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}