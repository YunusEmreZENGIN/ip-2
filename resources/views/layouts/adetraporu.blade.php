@extends('index2')

@section('main2')
    <style>
        body {
            zoom: 80%;
        }

        .top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .page-end {
            justify-content: space-between;
        }

        .filter-container {
            width: 320px;
            margin-bottom: 20px;
            border: 1px solid #dedede;
            border-radius: 10px;
        }

        .filter-container select,
        .filter-container input {
            margin-bottom: 10px;
        }

        .table-section {
            margin-top: 30px;
        }

        .export-btn-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Forms</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rfıd Kart Oluşturma</li>
                </ul>
                <h1 class="page-title badge badge-success">Adet Raporu</h1>
            </div>

            <div class="export-btn-container">
                <button class="btn btn-warning" onclick="exportData()">Dışa Aktar</button>
            </div>

            <div class="page-content">
                

                <hr>

                <div class="table-section table-responsive">
                    <table id="tableAR" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Cihaz ID</th>
                                <th>Bant</th>
                                <th>Üretim Siparişi No</th>
                                <th>Müşteri Sipariş No</th>
                                <th>Model Kodu</th>
                                <th>Ürün</th>
                                <th>Adı Soyadı</th>
                                <th>Operasyon</th>
                                <th>Adet</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"></tbody>
                    </table>
                </div>

                <div class="page-end d-flex p-3">
                    <div id="recordCount" class="badge bg-success" style="margin-left: 730px;">Kayıt Sayısı: 0</div>
                    <div id="totalQuantity" class="badge bg-success ms-auto">Toplam Adet: 0</div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            loadDataWithFetch();
        });

        function loadDataWithFetch() {
            fetch('/getData')
                .then(response => {
                    if (!response.ok) throw new Error('Veri çekme hatası');
                    return response.json();
                })
                .then(data => {
                    console.log("Veri alındı:", data);
                    if (data.length === 0) {
                        $('#tableAR').DataTable().clear().draw(); // Tabloda veri yoksa temizle
                        document.getElementById('recordCount').textContent = "Kayıt Sayısı: 0";
                        document.getElementById('totalQuantity').textContent = "Toplam Adet: 0";
                        console.log("Veri bulunamadı.");
                    } else {
                        populateTable(data);
                    }
                })
                .catch(error => {
                    console.error("Hata:", error);
                    alert("Veri yüklenirken hata oluştu.");
                });
        }

        function populateTable(data) {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = data.map(item => `
                <tr>
                    <td>${item.date}</td>
                    <td>${item.device_id}</td>
                    <td>${item.line}</td>
                    <td>${item.productionOrder}</td>
                    <td>${item.customerOrder}</td>
                    <td>${item.modelCode}</td>
                    <td>${item.product}</td>
                    <td>${item.operator}</td>
                    <td>${item.operation}</td>
                    <td>${item.quantity}</td>
                </tr>
            `).join('');

            // DataTable'ı düzgün şekilde yeniden başlat
            if ($.fn.DataTable.isDataTable('#tableAR')) {
                $('#tableAR').DataTable().clear().destroy();
            }

            $('#tableAR').DataTable({
                lengthMenu: [
                    [10, 25, 50, 75, -1],
                    ['10 Adet', '25 Adet', '50 Adet', '75 Adet', 'Tümü']
                ],
                order: [
                    [0, 'desc']
                ],
                sDom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: ['copy', 'excel', 'pdf', 'csv']
            });

            updateFooterInfo(data);
        }

        function updateFooterInfo(data) {
            const recordCount = data.length;
            const totalQuantity = data.reduce((sum, item) => sum + parseFloat(item.quantity || 0), 0);

            document.getElementById('recordCount').textContent = `Kayıt Sayısı: ${recordCount}`;
            document.getElementById('totalQuantity').textContent = `Toplam Adet: ${totalQuantity}`;
        }

        function applyLineFilter() {
            const filterParams = {
                line: document.getElementById('lineFilter').value !== 'Bant' ? document.getElementById('lineFilter').value : '',
                productionOrder: document.getElementById('productionOrderFilter').value !== 'Üretim Sipariş No' ? document.getElementById('productionOrderFilter').value : '',
                customerOrder: document.getElementById('customerOrderFilter').value !== 'Müşteri Sipariş No' ? document.getElementById('customerOrderFilter').value : '',
                product: document.getElementById('productFilter').value !== 'Ürün' ? document.getElementById('productFilter').value : '',
                modelCode: document.getElementById('modelCodeFilter').value !== 'Model Kodu' ? document.getElementById('modelCodeFilter').value : '',
                date: document.getElementById('startedDateFilter').value
            };

            const queryString = new URLSearchParams(filterParams).toString();
            console.log("Filtre URL Parametreleri:", queryString); // Filtre parametrelerini kontrol et

            fetch(`/getData?${queryString}`)
                .then(response => {
                    if (!response.ok) throw new Error('Filtreli veri çekme hatası');
                    return response.json();
                })
                .then(data => {
                    if (data.length === 0) {
                        $('#tableAR').DataTable().clear().draw();
                        document.getElementById('recordCount').textContent = "Kayıt Sayısı: 0";
                        document.getElementById('totalQuantity').textContent = "Toplam Adet: 0";
                        console.log("Filtrele sonrası veri bulunamadı.");
                    } else {
                        populateTable(data);
                    }
                })
                .catch(error => {
                    console.error("Hata:", error);
                    alert("Filtreleme sırasında hata oluştu.");
                });
        }

        window.exportData = function() {
            console.log("Dışa aktarılıyor...");
            // Buraya dışa aktarma işlemi eklenebilir, örneğin CSV veya Excel formatı
            alert("Dışa aktarım özelliği şu anda eklenmemiştir.");
        };

        window.applyLineFilter = applyLineFilter;
    </script>
@endsection
