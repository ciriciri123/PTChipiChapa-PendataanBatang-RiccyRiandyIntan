@extends('layouts.main')

@section('container')

<div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('INPUT NEW ITEM') }} </div>
            <div class="card-body">
                <form action="/update-barang/{{$barang->id}}" method="POST" enctype="multipart/form-data">
                   
                    @csrf
                    @method('PATCH')
 
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Barang</label>
                        <input name="namaBarang" type="text" class="form-control" id="formGroupExampleInput" value="{{$barang->namaBarang}}">
                    </div>
                    @error('namaBarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Stok Barang</label>
                        <input name="stok" type="text" class="form-control" id="formGroupExampleInput" value="{{$barang->stok}}">
                    </div>
                    @error('stok')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Harga Barang</label>
                        <input name="hargaBarang" type="number" class="form-control" id="formGroupExampleInput" value="{{ $barang->hargaBarang }}">
                    </div>
                    @error('hargaBarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Foto Barang</label>
                        <input name="gambar" type="file" class="form-control" id="formGroupExampleInput" value="{{ $barang->gambar }}">
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
                            <option value="{{ $kategori->id }}" {{$kategori->id == $barang->kategori_id ? 'selected' : ''}}>{{$kategori['nama']}}</option>
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