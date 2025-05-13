@extends('index2')



@section('main2')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Forms</h3>
                <ul class="breadcrumbs mb-3" style="margin-left: 940px;">
                    <li class="breadcrumb-item"><a href="#  ">Home</a></li>
                    <li class="breadcrumb-item">Rfıd Cart Oluşturma</li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Rfıd Cart Oluşturma</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form role="form" action="{{ route('rfid-cards.store') }}" method="POST">
                                    @csrf
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label for="uid">Kart UID</label>
                                            <select name="uid" id="uid-select" class="form-control">
                                                <option disabled selected>Seçiniz</option>
                                                @foreach ($uids as $u)
                                                    <option value="{{ $u->uid }}">{{ $u->uid }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <br>

                                            <label for="card_type">Kart Tipi</label>
                                            <select name="card_type" id="card_type" class="form-control">
                                                <option disabled selected>Seçiniz</option>
                                                @foreach ($cardTypes as $type)
                                                    <option value="{{ $type->id }}"
                                                        data-title="{{ strtolower($type->title) }}">{{ $type->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            {{-- Kişi Kartı Alanları --}}
                                            <div id="kisi-fields" class="mt-3" style="display: none;">
                                                <label>Kişi Adı:</label>
                                                <select name="first_name" id="first_name" class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($personel as $p)
                                                        <option value="{{ $p->first_name }}">{{ $p->first_name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label>Kişi Soyadı:</label>
                                                <select name="last_name" id="last_name" class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($personel as $p)
                                                        <option value="{{ $p->last_name }}">{{ $p->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label>Personel No:</label>
                                                <select name="personel_no" id="personel_no" class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($personel as $p)
                                                        <option value="{{ $p->personel_no }}">{{ $p->personel_no }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Operasyon Kartı Alanları --}}
                                            <div id="operasyon-fields" class="mt-3" style="display: none;">
                                                <label>Hat:</label>
                                                <select name="line" class="form-select">
                                                    <option selected disabled>Lütfen hattı seçiniz...</option>
                                                    <option value="Dikim-1">Dikim-1</option>
                                                    <option value="Dikim-2">Dikim-2</option>
                                                    <option value="Dikim-3">Dikim-3</option>
                                                </select>

                                                <br>

                                                <label>Operasyon Adı:</label>
                                                <select name="operation" class="form-select">
                                                    <option selected disabled>Lütfen operasyonu seçiniz...</option>
                                                    <option value="Flato Çekme">Flato Çekme</option>
                                                    <option value="Dikim">Dikim</option>
                                                    <option value="Kesim">Kesim</option>
                                                    <option value="Paça Çekme">Paça Çekme</option>
                                                </select>
                                            </div>

                                            {{-- Demet Kartı Alanları --}}
                                            <div id="demet-fields" class="mt-3" style="display: none;">
                                                <label>Sipariş No:</label>
                                                <select name="siparis_no" id="siparis_no" class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($models as $m)
                                                        <option value="{{ $m->siparis_no }}">{{ $m->siparis_no }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label>Müşteri Sipariş No:</label>
                                                <select name="musteri_siparis_no" id="musteri_siparis_no"
                                                    class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($models as $m)
                                                        <option value="{{ $m->musteri_siparis_no }}">
                                                            {{ $m->musteri_siparis_no }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label>Model Kodu:</label>
                                                <select name="model_kodu" id="model_kodu" class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($models as $m)
                                                        <option value="{{ $m->model_kodu }}">{{ $m->model_kodu }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label>Ürün Adı:</label>
                                                <select name="urun_adi" id="urun_adi" class="form-control">
                                                    <option disabled selected>Seçiniz</option>
                                                    @foreach ($models as $m)
                                                        <option value="{{ $m->urun_adi }}">{{ $m->urun_adi }}</option>
                                                    @endforeach
                                                </select>
                                                <br>


                                                <label>Adet:</label>
                                                <input type="number" name="adet" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action mt-3">
                                        <button class="btn btn-success" type="submit"><i
                                                class="fa-solid fa-floppy-disk"></i> Kaydet</button>
                                        <button class="btn btn-danger" type="reset">İptal</button>
                                    </div>
                                </form>

                                {{-- Script --}}
                                <script>
                                    document.getElementById('card_type').addEventListener('change', function() {
                                        const selectedOption = this.options[this.selectedIndex];
                                        const typeTitle = selectedOption.getAttribute('data-title');

                                        // Tüm alanları gizle
                                        document.getElementById('kisi-fields').style.display = 'none';
                                        document.getElementById('operasyon-fields').style.display = 'none';
                                        document.getElementById('demet-fields').style.display = 'none';

                                        // Seçime göre ilgili alanı göster
                                        if (typeTitle.includes('kişi')) {
                                            document.getElementById('kisi-fields').style.display = 'block';
                                        } else if (typeTitle.includes('operasyon')) {
                                            document.getElementById('operasyon-fields').style.display = 'block';
                                        } else if (typeTitle.includes('demet')) {
                                            document.getElementById('demet-fields').style.display = 'block';
                                        }
                                    });
                                </script>
                            @endsection
