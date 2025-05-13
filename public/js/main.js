$(document).ready(function () {
    // Blade'den gelen değerler
    var adetdegeri = @json($adetPercentage);
    var effiencyValue = @json($effiencyValue);
    var qualityValue = @json($qualityValue);
    var csrfToken = '{{ csrf_token() }}';

   
    // Verimlilik Chart
    var verimlilikRenk = effiencyValue < 50 ? "#FF0000" : effiencyValue < 75 ? "#FFA500" : "#08fc08";
    var verimlilikOptions = {
        series: [effiencyValue],
        chart: { type: 'radialBar' },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: { background: "#e7e7e7" },
                dataLabels: { value: { fontSize: '22px' } }
            }
        },
        fill: { colors: [verimlilikRenk] },
        labels: ['Toplam Verimlilik']
    };

    var verimlilikChart = new ApexCharts(document.querySelector("#verimlilik-grafik"), verimlilikOptions);
    verimlilikChart.render();

    // Kalite Chart
    var kaliteRenk = qualityValue < 50 ? "#FF0000" : qualityValue < 75 ? "#FFA500" : "#08fc08";
    var kaliteOptions = {
        series: [qualityValue],
        chart: { type: 'radialBar' },
        plotOptions: {
            radialBar: {
                startAngle: -90,
                endAngle: 90,
                track: { background: "#e7e7e7" },
                dataLabels: { value: { fontSize: '22px' } }
            }
        },
        fill: { colors: [kaliteRenk] },
        labels: ['Toplam Kalite']
    };

    var kaliteChart = new ApexCharts(document.querySelector("#kalite-grafik"), kaliteOptions);
    kaliteChart.render();
});
