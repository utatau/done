$(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');

});

function detail(id) {
    var base_url = $('#baseurl').val();
    window.location.href = base_url + "filemanager/detail/" + id;

}