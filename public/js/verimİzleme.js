let gridApi;

        const gridOptions = {
            columnDefs: [{
                    headerName: "Kayıtlı Olunan Bant",
                    field: "line",
                    filter: "agTextColumnFilter",
                    flex: 5,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "PersNo",
                    field: "persNo",
                    filter: "agTextColumnFilter",
                    flex: 3,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "PersAdi",
                    field: "persAdi",
                    filter: "agTextColumnFilter",
                    flex: 4,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "PerSoyadi",
                    field: "persSoyadi",
                    filter: "agTextColumnFilter",
                    flex: 4,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "GünSüre",
                    field: "gunSure",
                    filter: "agTextColumnFilter>",
                    flex: 4,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "GerçekleşenDakika",
                    field: "gerceklesenDakika",
                    filter: "agTextColumnFilter",
                    flex: 5,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "KayıpDakika",
                    field: "kayipDakika",
                    filter: "agtextColumnFilter",
                    flex: 4,
                    filterParams: {
                        caseSensitive: false,
                    },
                },
                {
                    headerName: "Kişisel Verimlilik",
                    field: "kisiselVerimlilik",
                    filter: "agTextColumnFilter",
                    flex: 5,
                    filterParams: {
                        caseSensitive: false,
                    },
                    cellRenderer: function(params) {
                        const value = params.value;
                        const barContainer = document.createElement('div');
                        barContainer.classList.add('bar-container');
                        barContainer.style.position = 'relative';


                        const bar = document.createElement('div');
                        bar.classList.add('bar');
                        bar.style.width = Math.min(value, 100) + '%';
                        bar.style.backgroundColor = value < 50 ? 'red' : value < 75 ? 'orange' : 'green';
                        bar.style.height = '20px';
                        bar.style.position = 'relative';

                        /* Bar Texti İçeriği */
                        const barText = document.createElement('span');
                        barText.classList.add('bar-text');
                        barText.textContent = value + '%';
                        barText.style.position = 'absolute';
                        barText.style.top = '50%';
                        barText.style.left = '50%';
                        barText.style.transform = 'translate(-50%,-50%)';
                        barText.style.color = "white";
                        barText.style.fontWeight = 'bold';
                        barText.style.fontSize = '12px';

                        bar.appendChild(barText);
                        barContainer.appendChild(bar);
                        return barContainer;
                    },
                },
                {
                    headerName: "İşletmeye Katkı Verimliliği",
                    field: "isletmeyeKatkıverimlilik",
                    filter: "agTextColumnFilter",
                    flex: 5,
                    filterParams: {
                        caseSensitive: false,
                    },
                    cellRenderer: function(params){
                        const value = params.value;
                        const barContainer = document.createElement('div');
                        barContainer.classList.add('bar-container');
                        barContainer.style.position = 'relative';

                        const bar = document.createElement('div');
                        bar.classList.add('bar');
                        bar.style.width =Math.min(value,100) + '%';
                        bar.style.backgroundColor = value < 50 ? 'red' : value <75 ? 'orange' : 'green';
                        bar.style.height = '20px';
                        bar.style.position = 'relative';

                        /*Bar Texti İçeriği */
                        const barText = document.createElement('span');
                        barText.classList.add('bar-text');
                        barText.textContent = value + '%';
                        barText.style.position = 'absolute';
                        barText.style.top = '50%';
                        barText.style.left = '50%';
                        barText.style.transform = 'translate(-50%,-50%)';
                        barText.style.color = 'white';
                        barText.style.fontWeight = 'bold';
                        barText.style.fontSize ='12px';

                        bar.appendChild(barText);
                        barContainer.appendChild(bar);
                        return barContainer;
                    },
                },
                {
                    headerName: "PersonelDetay",
                    field: "personelDetay",
                    filter: "agTextColumnFilter",
                    flex: 4,
                    cellRenderer: function(params) {
                        return `<button class="btn btn-info" onclick="openModal(${JSON.stringify(params.data)})">Details</button>`;
                    },
                    filterParams: {
                        caseSensitive: false,

                    },
                },
                {
                    headerName: "Personel Görevi",
                    field: "personelGorevi",
                    filter: "agTextColumFilter",
                    flex: 4,
                    filterParams: {
                        caseSensitive: false,
                    },
                }
            ],
            rowData: [{
                    line: "DIKIM-4",
                    persNo: "47",
                    persAdi: "Furkan ",
                    persSoyadi: "Akman",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "49",
                    isletmeyeKatkıverimlilik: "55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-4",
                    persNo: "51",
                    persAdi: "Ali ",
                    persSoyadi: "Karaman",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "9",
                    kisiselVerimlilik: "74.25",
                    isletmeyeKatkıverimlilik: "80.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-4",
                    persNo: "77",
                    persAdi: "Semih ",
                    persSoyadi: "Salaman",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "92.61",
                    isletmeyeKatkıverimlilik: "87.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-3",
                    persNo: "74",
                    persAdi: "Melike ",
                    persSoyadi: "İzci",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "72.61",
                    isletmeyeKatkıverimlilik: "65.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-1",
                    persNo: "79",
                    persAdi: "Yunus Emre ",
                    persSoyadi: "Zengin",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "62.61",
                    isletmeyeKatkıverimlilik: "77.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-2",
                    persNo: "85",
                    persAdi: "Burak ",
                    persSoyadi: "Kanboz",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "40.64",
                    isletmeyeKatkıverimlilik: "70.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-2",
                    persNo: "87",
                    persAdi: "Hüseyin ",
                    persSoyadi: "Demirci",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "47.64",
                    isletmeyeKatkıverimlilik: "71.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-2",
                    persNo: "73",
                    persAdi: "Hüseyin ",
                    persSoyadi: "Topuz",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "85.64",
                    isletmeyeKatkıverimlilik: "71.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-3",
                    persNo: "81",
                    persAdi: "Melike ",
                    persSoyadi: "Avcı",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "82.61",
                    isletmeyeKatkıverimlilik: "77.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-1",
                    persNo: "82",
                    persAdi: "Tolga ",
                    persSoyadi: "Topuz",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "62.61",
                    isletmeyeKatkıverimlilik: "57.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-2",
                    persNo: "91",
                    persAdi: "Burak ",
                    persSoyadi: "Sporcu",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "87.64",
                    isletmeyeKatkıverimlilik: "82.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-2",
                    persNo: "87",
                    persAdi: "Semih ",
                    persSoyadi: "Büyüktopçu",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "88.64",
                    isletmeyeKatkıverimlilik: "81.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
                {
                    line: "DIKIM-2",
                    persNo: "73",
                    persAdi: "Kemal ",
                    persSoyadi: "Akıt",
                    gunSure: "491",
                    gerceklesenDakika: "500",
                    kayipDakika: "0",
                    kisiselVerimlilik: "85.64",
                    isletmeyeKatkıverimlilik: "71.55",
                    personelDetay: "Details",
                    personelGorevi: "operator",
                },
            ],
            onRowClicked: function (event) {
              openModal(event.data);
            },
            pagination: true,
            paginationPageSize: 15,
            paginationPageSizeSelector: [10, 15,20, 25, 30, 50, 70],
            sideBar: true,
        };

        

        document.addEventListener("DOMContentLoaded", function() {
            const gridDiv = document.querySelector("#myGrid");
            const gridInstance = new agGrid.Grid(gridDiv, gridOptions);
            gridApi = gridOptions.api;
              // Modal kapatma işlemleri
              document.getElementById('closeModal').addEventListener('click', closeModal);
              document.getElementById('modalOverlay').addEventListener('click', closeModal);
  
        });

        function openModal(data){
            // Bar oluşturma fonksiyonu
            function createBar(value) {
                const barContainer = document.createElement('div');
                barContainer.classList.add('bar-container');
                barContainer.style.position = 'relative';
        
                const bar = document.createElement('div');
                bar.classList.add('bar');
                bar.style.width = Math.min(value, 100) + '%';
                bar.style.backgroundColor = value < 50 ? 'red' : value < 75 ? 'orange' : 'green';
                bar.style.height = '20px';
                bar.style.position = 'relative';
        
                const barText = document.createElement('span');
                barText.classList.add('bar-text');
                barText.textContent = value + '%';
                barText.style.position = 'absolute';
                barText.style.top = '50%';
                barText.style.left = '50%';
                barText.style.transform = 'translate(-50%,-50%)';
                barText.style.color = 'white';
                barText.style.fontWeight = 'bold';
                barText.style.fontSize = '12px';
        
                bar.appendChild(barText);
                barContainer.appendChild(bar);
                return barContainer;
            }
        
            // Modal içeriğini oluşturma
            document.getElementById('modalContent').innerHTML = `
                <p>Kayıtlı Olunan Bant: ${data.line}</p>
                <p>Personel No: ${data.persNo}</p>
                <p>Personel Adı: ${data.persAdi}</p>
                <p>Personel Soyadı: ${data.persSoyadi}</p> 
                <p>Personel GünSüresi: ${data.gunSure}</p>
                <p>Personel Gerçekleşen Dakika: ${data.gerceklesenDakika}</p>
                <p>Personel Kayıp Dakika: ${data.kayipDakika}</p>
                <p>Personel Kisisel Verimlilik: </p>
                <div id="kisiselVerimlilikBar"></div>
                <p>Personel İşletmeye Katkı Verimlilik: </p>
                <div id="isletmeyeKatkıverimlilikBar"></div>
               
                <p>Personel Görevi: ${data.personelGorevi}</p>
            `;
        
            // Verimlilik Barlarını ekleyelim
            document.getElementById('kisiselVerimlilikBar').appendChild(createBar(parseFloat(data.kisiselVerimlilik)));
            document.getElementById('isletmeyeKatkıverimlilikBar').appendChild(createBar(parseFloat(data.isletmeyeKatkıverimlilik)));
        
            // Modal'ı göster
            document.getElementById('myModal').style.display = 'block';
        }
        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
        function exportData(){
            if(!gridApi){
                alert("Grid Api bulunamadı");
            }
            gridApi.exportDataAsExcel({
                filename: 'Verim İzleme Raporları.xlsx',
                sheetname: 'Verim İzleme Raporları',
            });          
        }

        function getdayDuration(){
            const allRows = [];
            gridOptions.api.forEachNode(function(node){
                allRows.push(node.data);
            });
            return allRows.reduce((total,row) => total + parseFloat(row.gunSure || 0 ),0);

        }
        
        function getactualMinute(){
            const allRows = [];
            gridOptions.api.forEachNode(function(node){
                allRows.push(node.data);
            });
            return allRows.reduce((total,row) => total + parseFloat(row.gerceklesenDakika || 0),0);
        }

        function getlostTime(){
            const allRows = [];
            gridOptions.api.forEachNode(function(node){
                allRows.push(node.data);
            });
            return allRows.reduce((total,row) => total + parseFloat(row.kayipDakika || 0 ),0);
        }

        function getpersonalEffiency(){
            const allRows = [];
            gridOptions.api.forEachNode(function(node){
                allRows.push(node.data);

            });
            return allRows.reduce((total,row)=> total + parseFloat(row.kisiselVerimlilik || 0),0)/allRows.length;
        }

        function updatedayDuration(){
            const totaldayduration = getdayDuration();
            document.getElementById("dayDuration").textContent = `Toplam Gun Sure: ${totaldayduration}`;
        }

        function updateactualMinute(){
            const totalactualMinute = getactualMinute();
            document.getElementById("actualMinute").textContent = `Toplam Gerçekleşen Dakika: ${totalactualMinute}`;
        }
        function updatelostTime(){
            const totallostTime = getlostTime();
            document.getElementById("lostTime").textContent = `Toplam Kayıp Dakika: ${totallostTime}`;
        }

        function updatepersonalEffiency(){
            const totalpersonalEffiency = getpersonalEffiency();
            document.getElementById("personalEffiency").textContent = `Ortalama: ${totalpersonalEffiency}`;
        }

        function updateFooterInfo(){
            updatedayDuration();
            updateactualMinute();
            updatelostTime();
            updatepersonalEffiency();
        }

        window.onload = function() {
            updateFooterInfo();
        }
        window.exportData = exportData;