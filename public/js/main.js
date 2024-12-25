$(document).ready(function () {
    // Blade'den gelen değerler
    var adetdegeri = @json($adetPercentage);
    var effiencyValue = @json($effiencyValue);
    var qualityValue = @json($qualityValue);
    var csrfToken = '{{ csrf_token() }}';

    // Adet Chart
    function renderAdetChart(adetPercentage, adetColor) {
        var adetoptions = {
            series: [adetPercentage],
            chart: { type: 'radialBar' },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    track: { background: "#e7e7e7" },
                    dataLabels: {
                        value: {
                            fontSize: '22px',
                            formatter: function (val) {
                                return val.toFixed(2) + "%";
                            }
                        }
                    }
                }
            },
            fill: { colors: [adetColor] },
            labels: ['Toplam Adet']
        };

        var adetChart = new ApexCharts(document.querySelector("#adet-grafik"), adetoptions);
        adetChart.render();
    }

    var adetRenk = adetdegeri < 50 ? "#FF0000" : adetdegeri < 75 ? "#FFA500" : "#08fc08";
    renderAdetChart(adetdegeri, adetRenk);

    // Adet Hesaplama Butonu
    $('#calculatedButton').click(function () {
        var expectedTotal = $("#expectedtotal").val();

        if (!expectedTotal || expectedTotal < 0) {
            alert("Lütfen geçerli bir adet giriniz...");
            return;
        }

        $.ajax({
            url: '/calculateddata',
            type: 'POST',
            data: {
                expectedTotal: expectedTotal,
                _token: csrfToken
            },
            success: function (response) {
                var adetPercentage = response.adetPercentage;
                var adetColor = adetPercentage < 50 ? "#FF0000" : adetPercentage < 75 ? "#FFA500" : "#08fc08";

                renderAdetChart(adetPercentage, adetColor);
            },
            error: function () {
                alert("Bir hata oluştu, lütfen tekrar deneyin.");
            }
        });
    });

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
