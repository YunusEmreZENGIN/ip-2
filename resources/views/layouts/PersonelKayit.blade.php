@extends('index2')

@section('main2')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Personel Tanımlama</h3>
                <ul class="breadcrumbs mb-3" style="margin-left: 800px;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Personel Ekle</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Yeni Personel</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('personel.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="personel_no">Personel No</label>
                                    <input type="text" name="personel_no"
                                        class="form-control @error('personel_no') is-invalid @enderror"
                                        placeholder="Personel numarası girin...">
                                    @error('personel_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="first_name">Adı</label>
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        placeholder="Ad girin...">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="last_name">Soyadı</label>
                                    <input type="text" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        placeholder="Soyad girin...">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="birth_date">Doğum Tarihi</label>
                                    <input type="date" name="birth_date"
                                        class="form-control @error('birth_date') is-invalid @enderror">
                                    @error('birth_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="gender">Cinsiyet</label>
                                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                        <option selected disabled>Cinsiyet seçin...</option>
                                        <option value="Erkek">Erkek</option>
                                        <option value="Kadın">Kadın</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="marital_status">Medeni Hali</label>
                                    <select name="marital_status"
                                        class="form-select @error('marital_status') is-invalid @enderror">
                                        <option selected disabled>Durum seçin...</option>
                                        <option value="Bekar">Bekar</option>
                                        <option value="Evli">Evli</option>
                                    </select>
                                    @error('marital_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="photo">Fotoğraf</label>
                                    <input type="file" name="photo"
                                        class="form-control @error('photo') is-invalid @enderror" width="100">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-action mt-4">
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>
                                        Kaydet</button>
                                    <button type="reset" class="btn btn-danger">İptal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
