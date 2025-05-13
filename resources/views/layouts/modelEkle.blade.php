@extends('index2')

@section('main2')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Model Tanımlama</h3>
            <ul class="breadcrumbs mb-3" style="margin-left: 940px;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Model Tanımlama</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Yeni Model Tanımla</div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('model.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="siparis_no">Sipariş No:</label>
                                <input type="text" name="siparis_no" class="form-control @error('siparis_no') is-invalid @enderror" placeholder="Sipariş Numarasını Giriniz..." />
                                @error('siparis_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="musteri_siparis_no">Müşteri Sipariş No:</label>
                                <input type="text" name="musteri_siparis_no" class="form-control @error('musteri_siparis_no') is-invalid @enderror" placeholder="Müşteri Sipariş Numarasını Giriniz..." />
                                @error('musteri_siparis_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="model_kodu">Model Kodu:</label>
                                <input type="text" name="model_kodu" class="form-control @error('model_kodu') is-invalid @enderror" placeholder="Model Kodunu Giriniz..." />
                                @error('model_kodu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="urun_adi">Ürün Adı:</label>
                                <input type="text" name="urun_adi" class="form-control @error('urun_adi') is-invalid @enderror" placeholder="Ürün Adını Giriniz..." />
                                @error('urun_adi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="card-action mt-3">
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> Kaydet</button>
                                <button class="btn btn-danger" type="reset">İptal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
