@extends('layouts.main')

@section('container')
<body>
   
   
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('INPUT KATEGORI BARU') }} </div>
            <div class="card-body">
                <form action="/buatKategori" method="POST" enctype="multipart/form-data">
                   
                    @csrf
 
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input name="nama" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Kategori">
                    </div>
                    @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
 
                    <button type="submit" class="btn btn-primary">Buat Kategori</button>
 
                </form>
            </div>
        </div>
    </div>
 
 
</body>
@endsection