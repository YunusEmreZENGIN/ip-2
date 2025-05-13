@extends('index2')

@section('main2')
    <style>
        body {
            zoom: 80%;
        }

        .bar-container {
            height: 20px;
            background-color: #ddd;
            width: 100%;
            border-radius: 5px;
            position: relative;
            margin-top: 10px;
        }

        .bar {
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s ease-in-out;
        }

        .red {
            background-color: #f44336;
        }

        .orange {
            background-color: #ffa500;
        }

        .green {
            background-color: #4caf50;
        }

        .bar-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }
    </style>

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Verim İzleme</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Verim</li>
                </ul>
            </div>

            <div class="export-btn-container">
                <button class="btn btn-warning" onclick="exportData()" style="margin-left:1480px;">Dışa Aktar</button>
            </div>

            <div class="table-section table-responsive" style="position: relative;">
                <table id='tableVI' class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kayıtlı Olunan Bant</th>
                            <th>PersNo</th>
                            <th>PersAdi</th>
                            <th>PerSoyadi</th>
                            <th>GünSüre</th>
                            <th>GerçekleşenDakika</th>
                            <th>KayıpDakika</th>
                            <th>Kişisel Verimlilik</th>
                            <th>İşletmeye Katkı Verimliliği</th>
                            <th>Personel Görevi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>

            <div class="d-flex p-3">
                <div id="dayDuration" class="badge bg-success">Toplam: 0</div>
                <div id="actualMinute" class="badge bg-success ms-3">Toplam: 0</div>
                <div id="lostTime" class="badge bg-success ms-3">Toplam: 0</div>
                <div id="personalEffiency" class="badge bg-success ms-3">AVG: 0</div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal" tabindex="-1" role="dialog" style="display:none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personel Detay</h5>
                    <button type="button" class="close" onclick="closeModal()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modalContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Kapat</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let dataTableInstance;

        function populateTable(data) {
            let tableBody = "";
            data.forEach((item) => {
                tableBody += `<tr>
                    <td>${item.line}</td>
                    <td>${item.persNo}</td>
                    <td>${item.persAdi}</td>
                    <td>${item.persSoyadi}</td>
                    <td>${item.gunSure}</td>
                    <td>${item.gerceklesenDakika}</td>
                    <td>${item.kayipDakika}</td>
                    <td>
                        <div class="bar-container">
                            <div class="bar ${getBarColor(item.kisiselVerimlilik)}" style="width: ${item.kisiselVerimlilik}%;">
                                <span class="bar-text">${item.kisiselVerimlilik}%</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="bar-container">
                            <div class="bar ${getBarColor(item.isletmeyeKatkıverimlilik)}" style="width: ${item.isletmeyeKatkıverimlilik}%;">
                                <span class="bar-text">${item.isletmeyeKatkıverimlilik}%</span>
                            </div>
                        </div>
                    </td>
                    <td>${item.personelGorevi}</td>
                </tr>`;
            });

            document.getElementById("tableBody").innerHTML = tableBody;

            if ($.fn.DataTable.isDataTable("#tableVI")) {
                $("#tableVI").DataTable().clear().destroy();
            }

            dataTableInstance = $("#tableVI").DataTable({
                lengthMenu: [[10, 25, 50, -1], ["10 Adet", "25 Adet", "50 Adet", "Tümü"]],
                order: [[0, "desc"]],
                sDom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: ["copy", "excel", "pdf", "csv"],
            });

            updateFooterInfo(data);
        }

        function getBarColor(value) {
            const number = parseFloat(value);
            if (number < 50) return "red";
            else if (number < 75) return "orange";
            else return "green";
        }

        function getdayDuration() {
            return [...document.querySelectorAll("#tableBody tr")].reduce((sum, row) => sum + parseInt(row.cells[4].innerText || 0), 0);
        }

        function getactualMinute() {
            return [...document.querySelectorAll("#tableBody tr")].reduce((sum, row) => sum + parseInt(row.cells[5].innerText || 0), 0);
        }

        function getlostTime() {
            return [...document.querySelectorAll("#tableBody tr")].reduce((sum, row) => sum + parseInt(row.cells[6].innerText || 0), 0);
        }

        function getpersonalEffiency() {
            const rows = [...document.querySelectorAll("#tableBody tr")];
            const total = rows.reduce((sum, row) => sum + parseFloat(row.cells[7].innerText.replace('%', '') || 0), 0);
            return (total / rows.length || 0).toFixed(2) + "%";
        }

        function updateFooterInfo() {
            document.getElementById("dayDuration").textContent = "Toplam: " + getdayDuration();
            document.getElementById("actualMinute").textContent = "Toplam: " + getactualMinute();
            document.getElementById("lostTime").textContent = "Toplam: " + getlostTime();
            document.getElementById("personalEffiency").textContent = "AVG: " + getpersonalEffiency();
        }

        window.onload = function () {
            fetch('/get-data-vi')
                .then(response => response.json())
                .then(data => populateTable(data))
                .catch(error => console.error("Veri alınırken hata oluştu:", error));
        };

        window.exportData = function () {
            dataTableInstance.button('.buttons-excel').trigger();
        };

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
@endsection
