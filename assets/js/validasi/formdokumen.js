function validateForm() {
    var kode_rak = document.forms["myForm"]["kode_rak"].value;
    var nama_tenaga_krj = document.forms["myForm"]["nama_tenaga_krj"].value;
    var kpj = document.forms["myForm"]["kpj"].value;
    var tgl_upload = document.forms["myForm"]["tgl_upload"].value;
    var tambah_masa_berlaku = document.forms["myForm"]["tambah_masa_berlaku"].value;
    var file = document.forms["myForm"]["file"].value;

    if (kode_rak == '') {
        validasi('Kode Rak wajib di isi!', 'warning');
        return false;
    } else if (nama_tenaga_krj == '') {
        validasi('nama_tenaga_krj wajib di isi!', 'warning');
        return false;
    } else if (kpj == '') {
        validasi('kpj Dokumen wajib di isi!', 'warning');
        return false;
    } else if (tgl_upload == '') {
        validasi('Tanggal Upload wajib di isi!', 'warning');
        return false;
    } else if (tambah_masa_berlaku == '') {
        validasi('Masa Berlaku wajib di isi!', 'warning');
        return false;
    } else if (file == '') {
        validasi('File Wajib di isi!', 'warning');
        return false;
    }

}
function validateFormUpdate() {
    var kode_rak = document.forms["myFormUpdate"]["kode_rak"].value;
    var nama_tenaga_krj = document.forms["myFormUpdate"]["nama_tenaga_krj"].value;
    var kpj = document.forms["myFormUpdate"]["kpj"].value;
    var kategori = document.forms["myFormUpdate"]["kategori"].value;
    var tgl_upload = document.forms["myFormUpdate"]["tgl_upload"].value;
    var tambah_masa_berlaku = document.forms["myFormUpdate"]["tambah_masa_berlaku"].value;
    var fileLama = document.forms["myFormUpdate"]["fileLama"].value;

    if (kode_rak == '') {
        validasi('Kode Rak wajib di isi!', 'warning');
        return false;
    } else if (nama_tenaga_krj == '') {
        validasi('Nama Tenaga Kerja wajib di isi!', 'warning');
        return false;
    } else if (kpj == '') {
        validasi('kpj wajib di isi!', 'warning');
        return false;
    } else if (kategori == '') {
        validasi('Kategori wajib di isi!', 'warning');
        return false;
    } else if (tgl_upload == '') {
        validasi('Tanggal Upload wajib di isi!', 'warning');
        return false;
    } else if (tambah_masa_berlaku == '') {
        validasi('Masa Berlaku wajib di isi!', 'warning');
        return false;
    } else if (fileLama == '') {
        validasi('File Wajib di isi!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}


function fileIsValid(fileName) {
    var ext = fileName.match(/\.([^\.]+)$/)[1];
    ext = ext.toLowerCase();
    var isValid = true;
    switch (ext) {
        case 'pdf':
        case 'xlsx':
            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize() {
    var file = document.getElementById('GetFile').files[0];


    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan PDF/EXCEL!', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }
        var content;
        var size = file.size;
        if ((size != null) && ((size / (1024 * 1024)) > 3)) {
            validasi('Ukuran maximum 5MB', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        $(".custom-file-label").addClass("selected").html(file.name);
        document.getElementById('outputFile').src = window.URL.createObjectURL(file);
        return true;

    } else
        return false;
}