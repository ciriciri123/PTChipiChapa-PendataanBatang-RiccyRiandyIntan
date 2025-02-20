@extends('layouts.main')
 
@section('container')

@if($orders->isEmpty())

<div class="container col-md-8" style="padding-top: 20px">
    <div class="card shadow">
        <div class="card-header text-center">{{ __('ORDER') }} </div>
            <div class="card-body">
                <p>Order kosong</p>
                <a href="/halamanUtama">Buat order!!</a>
            </div>
        </div>
    </div>
</div>

@else

    @foreach($orders as $order)
    <div class="container col-md-8" style="padding-top: 20px; width: 900px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('ORDER') }} {{$loop->iteration}}</div>
                <div class="card-body">                    
                    <table>
                        <tbody class=table>
                            <tr>
                                <td style="width: 120px">Nomor faktur</td>
                                <td>: {{$order -> nomorFaktur}}</td>
                            </tr>    
                            <tr>
                                <td>Kode Pos</td>
                                <td>: {{$order -> kodePos}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{$order -> alamat}}</td>                                    
                            </tr>
                        </tbody>
                    </table>
                    <table class=table>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">gambar</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderDetails[$order->id] as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/images/'.$detail->barang->gambar) }}" alt="{{ $detail->barang->namaBarang }}" style="height:50px"></td>
                                <td>{{ $detail->barang->namaBarang }}</td>
                                <td>{{ $detail->barang->kategori->nama }}</td>
                                <td>Rp.{{ number_format($detail->barang->hargaBarang, 2, ',', '.') }}</td>
                                <td style="text-align: center;">{{ $detail->jumlahBarang }}</td>
                                <td>Rp.{{ number_format($detail->subtotal, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-end"><strong>Total Harga:</strong></td>
                                <td>Rp.{{ number_format($order->totalHarga, 2, ',', '.') }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endif

@endsection