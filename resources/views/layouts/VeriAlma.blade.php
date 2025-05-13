@extends('index')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table id="Table" class="table table-hover table-striped table-bordered" style="margin-top: 150px;">
                <thead class="thead-dark" >
                    <tr>
                        <th>ID</th>
                        <th>Operator Adı</th>
                        <th>Operasyon Adı</th>
                        <th>Demet Numarası</th>
                        <th>Hedef Adet</th>
                        <th>09:15</th>
                        <th>10:15</th>
                        <th>11:30</th>
                        <th>12:30</th>
                        <th>13:30</th>
                        <th>15:15</th>
                        <th>16:15</th>
                        <th>17:30</th>
                        <th>18:30</th>
                        <th>Toplam Adet</th>
                        <th>Verimlilik (%)</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->operasyon_adi}}</td>
                        <td>{{$d->operator_adi}}</td>
                        <td>{{$d->demet_numrasi}}</td>
                        <td>{{$d->hedef_adet}}</td>
                        <td>{{$d->saat_09_15}}</td>
                        <td>{{$d->saat_10_15}}</td>
                        <td>{{$d->saat_11_30}}</td>
                        <td>{{$d->saat_12_30}}</td>
                        <td>{{$d->saat_13_30}}</td>
                        <td>{{$d->saat_15_15}}</td>
                        <td>{{$d->saat_16_15}}</td>
                        <td>{{$d->saat_17_30}}</td>
                        <td>{{$d->saat_18_30}}</td>
                        <td>{{$d->toplam_adet}}</td>
                        <td>{{$d->yüzde_verimlilik}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
