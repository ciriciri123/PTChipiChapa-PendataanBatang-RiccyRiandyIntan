@extends('layouts.main')
 
@section('container')
 
<div class="container col-md-8" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('FAKTUR') }} </div>
                <div class="card-body">
                    @if($keranjangs->isEmpty())
                    <p>Keranjang kosong</p>
                    <p>Total: Rp.{{ number_format(0, 2, ',', '.') }}</p>
                    @else
                        <form id ="simpanKeranjang" action="/simpanKeranjang" method="POST">
                            @csrf
                            <table class=table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="" class="form-label">Nomor faktur</label>
                                        </td>
                                        <td>
                                            <input name="nomorFaktur" type="text" value="{{$user.str_pad(time(), 13,'0')}}" readonly>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td><label for="" class="form-label">Kode Pos</label></td>
                                        <td>
                                            <input name="kodePos" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Kode pos">
                                            @error('kodePos')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td><label for="" class="form-label">Alamat</label></td>
                                        <td>
                                            <input name="alamat" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Alamat">
                                            @error('alamat')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">gambar</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keranjangs as $keranjang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/images/'.$keranjang->barang->gambar) }}" alt="{{ $keranjang->barang->namaBarang }}" style="height:50px"></td>
                                    <td>{{ $keranjang->barang->namaBarang }}</td>
                                    <td>{{ $keranjang->barang->kategori->nama }}</td>
                                    <td>Rp.{{ number_format($keranjang->barang->hargaBarang, 2, ',', '.') }}</td>
                                    <td style="text-align: center;">{{ $keranjang->jumlahBarang }}</td>
                                    <td>Rp.{{ number_format($keranjang->subtotal, 2, ',', '.') }}</td>
                                    <td>
                                        <form action="{{route('hapusKeranjang', ['id' => $keranjang -> id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Buang</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total Harga:</strong></td>
                                    <td>Rp.{{ number_format($keranjangs->sum('subtotal'), 2, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success" onclick="document.getElementById('simpanKeranjang').submit()">Simpan Keranjang</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection