$(document).ready(function () {

    getBulanPie();

});

function filterTahunPie() {
    $("#chartpie").empty();
    $('#chartpie').append('<canvas id="myPieChart"></canvas>');
    getBulanPie();
}

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


function getBulanPie() {
    var tahun = $('#tahunpie').val();
    var link = $('#baseurl').val();
    var base_url = link + 'home/getTotalTransaksi';
    $.ajax({
        type: 'POST',
        data: {
            tahun: tahun,
        },
        url: base_url,
        dataType: 'json',
        success: function (hasil) {
            $('#dm').text(hasil.jmldm);
            $('#kt').text(hasil.jmlkt);
            grafikPie(
                hasil.jmldm,
                hasil.jmlkt
            );
        }
    });

}

function grafikPie(dm, kt) {
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Dokumen", "Kategori"],
            datasets: [{
                data: [dm, kt],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#2d926d', '#9e291f'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    return myPieChart;

}