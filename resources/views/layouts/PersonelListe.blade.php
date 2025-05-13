@extends('index2')

@section('main2')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Personel Listesi</h3>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th>Personel No</th>
                            <th>Adı</th>
                            <th>Soyadı</th>
                            <th>Doğum Tarihi</th>
                            <th>Cinsiyet</th>
                            <th>Medeni Hali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personeller as $personel)
                        <tr>
                           
                            <td>{{ $personel->personel_no }}</td>
                            <td>{{ $personel->first_name }}</td>
                            <td>{{ $personel->last_name }}</td>
                            <td>{{ $personel->birth_date }}</td>
                            <td>{{ $personel->gender }}</td>
                            <td>{{ $personel->marital_status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
