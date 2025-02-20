@extends('layouts.main')

@section('container')

<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('INPUT BARANG BARU') }} </div>
            <div class="card-body">
                <form action="/buat-barang" method="POST" enctype="multipart/form-data">
                   
                    @csrf
 
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Barang</label>
                        <input name="namaBarang" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Nama Barang">
                    </div>
                    @error('namaBarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Stok Barang</label>
                        <input name="stok" type="integer" class="form-control" id="formGroupExampleInput" placeholder="Input Stok">
                    </div>
                    @error('stok')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3" >
                        <label for="" class="form-label">Harga Barang</label>
                        <div style="display:flex">
                            Rp.&nbsp&nbsp<input name="hargaBarang" type="number" class="form-control" id="formGroupExampleInput" placeholder="Input Harga" style="width: 100%;">
                        </div>
                    </div>
                    @error('hargaBarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Foto Barang</label>
                        <input name="gambar" type="file" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                    @error('gambar')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori Barang</label>
                        <select name="kategori_id" id="">
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{$kategori['nama']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('kategori_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
 
                    <button type="submit" class="btn btn-primary">Insert</button>
 
                </form>
            </div>
        </div>
    </div>

@endsection

