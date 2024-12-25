@extends('index')




@section('main')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            zoom: 67%;
            font-family: 'poppins', sans-serif;
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

        .modal {
            background-color: rgba(0, 0, 0, 0.3);
            7 opacity: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 1000;
            border-radius: 70px;
            zoom: 125%;
        }

        .bar-container {
            width: 100%;
            margin-bottom: 10px;
        }

        .bar {
            position: relative;
            height: 20px;
            border-radius: 5px;
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
    <h1 class="page-title badge badge-success" style="margin-left:1020px; font-size: 40px;"> Verim İzleme</h1>
    <div style="margin-bottom: 20px; margin-left:150px;">
        <button class="btn btn-warning" style="margin-left:2000px; margin-bottom:20px;" onclick="exportData()">Dışa
            Aktar</button>
    </div>
    <div id="myGrid" class="ag-theme-alpine" style="margin-left: 170px;height: 600px; width: 2080px;"></div>
    <div class="page-end d-flex p-3 " style="margin-left: 185px;">
        <div id="dayDuration" class="badge badge-pill bg-success" style="margin-left: 640px;">Toplam: 0 </div>
        <div id="actualMinute" class="badge badge-pill bg-success" style="margin-left: 30px;">Toplam: 0 </div>
        <div id="lostTime" class="badge badge-pill bg-success" style="margin-left: 30px;">Toplam: 0 </div>
        <div id="personalEffiency" class="badge badge-pill bg-success" style="margin-left: 30px;">AVG: 0 </div>
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
                    <button type="button" class="deatails btn btn-secondary" onclick="closeModal()">Kapat</button>
                </div>
            </div>
        </div>
    </div>







    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/ag-grid-enterprise@32.3.3/dist/ag-grid-enterprise.min.js';
    </script>


    <script src="/js/verimİzleme.js"></script>
@endsection
