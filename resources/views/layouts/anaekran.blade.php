@extends("index")

@section("main")
    <script src="https://cdn.jsdelivr.net/npm/dayjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="charts ">
        <div class="charts-card" style="background-color: #f4f4f4;">
            <h4 class="charts-title">Bant Verimlilik Raporları</h4>
            <!-- Grafik için container div -->
            <div id="chart">
                <script src="https://cdn.jsdelivr.net/npm/dayjs"></script>
                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <!-- Dayjs ve quarter eklentisini yükle -->
                <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/dayjs.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/plugin/quarterOfYear.js"></script>

                <script>
                    // Dayjs plugin'ini etkinleştir
                    dayjs.extend(dayjs_plugin_quarterOfYear);

                    var options = {
                        series: [{
                            name: "Verimlilik",
                            data: @json($effiencyData)
                        }],
                        chart: {
                            type: 'bar',
                            height: 380
                        },
                        xaxis: {
                            type: 'category',
                            labels: {
                                formatter: function(value) {
                                    return value; // Burada, Bant1, Bant2 gibi etiketler gösterilecek
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(value) {
                                    return value + "%"; // Y eksenindeki veriyi yüzde olarak göstermek
                                }
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            formatter: function(val) {
                                return val + "%"; // Çubuğun üstünde de yüzde gösterecek
                            },
                            style: {
                                fontSize: '12px',
                                fontWeight: 'bold',
                                colors: ['#304758']
                            }
                        },
                        title: {
                            text: '',
                        },
                        tooltip: {
                            x: {
                                formatter: function(val) {
                                    return "Bantlar: " ;
                                }
                            },
                            y: {
                                formatter: function(value) {
                                    return value + "%"; // Tooltipte de yüzde göstermek
                                }
                            }
                        },
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                </script>

            </div> <!-- Grafik container div -->
        </div>
    </div>



        <div class="charts">
            <div class="charts-row" style="display: flex; justify-content: space-around; gap: 20px; margin-top: 20px;">
                <!-- Verimlilik Chart -->
                <div class="charts-card" style="background-color: #f4f4f4; width: 425px; padding: 20px; border-radius: 10px;">
                    <h4 class="charts-title">Toplam-Verimlilik</h4>
                    <div id="verimlilik-grafik"></div>
                </div>

                <!-- Kalite Chart -->
                <div class="charts-card" style="background-color: #f4f4f4; width: 425px; padding: 20px; border-radius: 10px;">
                    <h4 class="charts-title">Toplam-Kalite</h4>
                    <div id="kalite-grafik"></div>
                </div>
                <!-- Adet Chart -->
                <div class="charts-card" style="background-color: #f4f4f4; width:425px; padding: 20px; border-radius: 10px;">
                    <h4 class="charts-title">Toplam-Adet</h4>
                    <div id="adet-grafik">
                        <h1  style="margin-top : 85px;margin-left: 150px;">{{$adetValue}}</h1>
                    </div>
                </div>


            </div>
        </div>



    <script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
            // Verimlilik Chart
            var verimlilikdegeri = @json($effiencyValue);
            var verimlilikrenk = verimlilikdegeri < 50 ? "#FF0000" : verimlilikdegeri < 75 ? "#FFA500" : "#08fc08";

            var verimlilikoptions = {
                series: [verimlilikdegeri],
                chart: { type: 'radialBar' },
                plotOptions: {
                    radialBar: {
                        startAngle: -90,
                        endAngle: 90,
                        track: { background: "#e7e7e7" },
                        dataLabels: { value: { fontSize: '22px' } }
                    }
                },
                fill: { colors: [verimlilikrenk] },
                labels: ['Toplam Verimlilik']
            };

            var verimlilikChart = new ApexCharts(document.querySelector("#verimlilik-grafik"), verimlilikoptions);
            verimlilikChart.render();

            // Kalite Chart
            var kalitedegeri = @json($qualityValue);
            var kaliterenk = kalitedegeri < 50 ? "#FF0000" : kalitedegeri < 75 ? "#FFA500" : "#08fc08";

            var kaliteoptions = {
                series: [kalitedegeri],
                chart: { type: 'radialBar' },
                plotOptions: {
                    radialBar: {
                        startAngle: -90,
                        endAngle: 90,
                        track: { background: "#e7e7e7" },
                        dataLabels: { value: { fontSize: '22px' } }
                    }
                },
                fill: { colors: [kaliterenk] },
                labels: ['Toplam Kalite']
            };

            var kaliteChart = new ApexCharts(document.querySelector("#kalite-grafik"), kaliteoptions);
            kaliteChart.render();
        </script>



@endsection

