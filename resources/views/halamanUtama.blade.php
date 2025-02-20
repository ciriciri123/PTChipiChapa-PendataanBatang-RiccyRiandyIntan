@extends('layouts.main')

@section('container')
<div class="container col-md-12" style="padding-top:20px">
        <div class="card shadow">
            <div class="card-header text-center"></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kategori</th>
                                <th scope="col" colspan="2">Jumlah barang</th>
                                <th scope="col">Tambah keranjang</th>
                                <!-- <th scope="col">Kuantitas</th> -->
                                @can('admin')
                                <th scope="col" colspan="2" class="text-center">Aksi</th>
                                @endcan
                            </tr
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{ asset('storage/images/' . $barang->gambar) }}" alt="{{$barang->namaBarang}}" style="height:70px"></td>
                                <td>{{$barang->namaBarang}}</td>
                                <td>{{$barang->stok}}</td>
                                <td>Rp.{{ number_format($barang->hargaBarang, 2, ',', '.') }}</td>
                                <td>{{$barang->kategori->nama}}</td>
                                <td>
                                    <form action="{{route('tambahKeranjang')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="barang_id" value="{{$barang->id}}">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <td>
                                            <input type="number" name="jumlahBarang" value="1">
                                        </td>    
                                        <td><button type="submit" action="/tambahKeranjang" class="btn btn-secondary">Tambah ke keranjang</button></td>
                                    </form>
                                </td>
                                @can('admin')
                                <td><a href="/update/{{ $barang->id }}"><button type="button" class="btn btn-warning">Update</button></a></td>
                                <td>
                                <form action="{{route('hapusBarang', ['id' => $barang->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                </td>
                                @endcan

                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @error('jumlahBarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        </div>
    </div>

@endsection
