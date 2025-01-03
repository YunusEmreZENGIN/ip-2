@extends('index')

@section('main')
    
    <h1 class="page-title badge badge-success"> Adet Raporu</h1>
    <div style="margin-bottom: 20px; margin-left:150px;">
        <button class="btn btn-warning" style="margin-left:1210px; margin-bottom:20px;" onclick="exportData()">Dışa
            Aktar</button>
    </div>
    <div id="myGrid" class="ag-theme-alpine" style="margin-left: 160px;height: 600px; width: 1300px;"></div>
    <div class="page-end d-flex  p-3" style="margin-left:160px;">
        <div id="recordCount" class="badge badge-pill bg-success">Kayıt Sayısı: 0</div>
        <div id="totalQuantity" class="badge badge-pill bg-success" style="margin-left:1030px;">Toplam Adet: 0 </div>
    </div>

    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/ag-grid-enterprise@32.3.3/dist/ag-grid-enterprise.min.js';

        let gridApi;
        const gridOptions = {
            rowData: [{
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "ALANUR TURAN",
                    operation: "Askılık Kalıplama",
                    quantity: "500",
                }, {
                    date: "24.03.2020",
                    line: "DIKIM-2",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Stelnica Ovenavic",
                    operation: "Askılık Kalıplama",
                    quantity: "100",
                }, {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Aleyna Tilki",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Valentina Cvetkovic",
                    operation: "Askılık Çıma",
                    quantity: "500",
                }, {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Arif Işık",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Volkan Demirel",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Tülay Babar",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Sinan Boz",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Sinan Hacıoğlu ",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Servet Karasu",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Senem Arslan",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Seda Gündüz",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Recep Aydın",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Melek Gülmez",
                    operation: "Askılık Çıma",
                    quantity: "500",
                }, {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Mahmut Tuncer",
                    operation: "Askılık Çıma",
                    quantity: "500",
                }, {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "İrem Sarı",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Gökhan Erdoğan",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Furkan Karaman",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-1",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Filiz Yılmaz",
                    operation: "Askılık Çıma",
                    quantity: "500",
                },
                {
                    date: "24.03.2020",
                    line: "DIKIM-3",
                    productionOrder: "20033386",
                    customerOrder: "3434",
                    modelCode: "544095/ELYON",
                    product: "ELYON",
                    operator: "Fazilet Emre",
                    operation: "Askılık Çıma",
                    quantity: "500",
                }
            ],
            columnDefs: [{
                headerName: "Tarih",
                field: "date",
                filter: "agDateColumnFilter",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Bant",
                field: "line",
                filter: "agTextColumnFilter",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Üretim Siparişi",
                filter: "agTextColumnFilter",
                field: "productionOrder",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Müşteri Sipariş No",
                filter: "agTextColumnFilter",
                field: "customerOrder",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Model Kodu",
                filter: "agTextColumnFilter",
                field: "modelCode",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Ürün",
                filter: "agTextColumnFilter",
                field: "product",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Adı Soyadı",
                filter: "agTextColumnFilter",
                field: "operator",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Operasyon",
                filter: "agTextColumnFilter",
                field: "operation",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }, {
                headerName: "Adet",
                filter: "agTextColumnFilter",
                field: "quantity",
                flex: 1,
                filterParams: {
                    caseSensitive: false,
                },
            }],
            pagination: true,
            paginationPageSize: 15,
            paginationPageSizeSelector: [10, 20, 25, 30, 50, 75],
            sideBar: true,
        };

        document.addEventListener("DOMContentLoaded", function() {
            const gridDiv = document.querySelector("#myGrid");
            const gridInstance = new agGrid.Grid(gridDiv,gridOptions);
            gridApi = gridOptions.api; 
            
            gridOptions.api.addEventListener("firstDataRendered", function() {
                updateRecordCount();
            });
        });

        function exportData() {
            if (!gridApi) {
                alert("Grid api bulunamadı");
                return;
            }
            gridApi.exportDataAsExcel({
                filename: 'Üretim Raporları.xlsx',
                sheetname: 'Üretim Raporları',
            });
        }

        function getRecordCount() {
            const allRows = [];
            gridOptions.api.forEachNode(function(node) {
                allRows.push(node.data); 
            });
            return allRows.length;
        }

        function getTotalQuantity() {
            const allRows = [];
            gridOptions.api.forEachNode(function(node) {
                allRows.push(node.data);
            });
            return allRows.reduce((total, row) => total + parseFloat(row.quantity || 0), 0);
        }

        function updateRecordCount() {
            const rowCount = getRecordCount();
            document.getElementById('recordCount').textContent = `Kayıt Sayısı: ${rowCount}`;
        }

        function updateTotalQuantity() {
            const totalQuantity = getTotalQuantity();
            document.getElementById('totalQuantity').textContent = `Toplam Adet: ${totalQuantity}`;
        }

        function updateFooterInfo() {
            updateRecordCount();
            updateTotalQuantity();
        }

        window.onload = function() {
            updateFooterInfo(); // Sayfa yüklendiğinde bilgi güncellemesi yapılsın
        };
        window.exportData = exportData;
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ag-grid/32.3.3/ag-grid-community.min.js"
        integrity="sha512-fD9MUUcwwAe0W4Qj+wis2c6GNIAIAgxkGiVNYa3ZZH+7uKdjPIU+VZ7wXffl4eLda4rVAIfxEqeO2Q0+4+w/Kw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
