@extends('layouts.main')

@section('container')

    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('Registrasi User') }} </div>
            <div class="card-body">
                <form action="/registrasi" method="POST" enctype="multipart/form-data">
                   
                    @csrf
 
                    <div class="mb-4">
                        <label for="" class="form-label">Nama</label>
                        <input name="namaUser" type="string" class="form-control" id="formGroupExampleInput" placeholder="Input Nama">
                    </div>
                    @error('namaUser')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-4">
                        <label for="" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Input Email">
                    </div>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-4">
                        <label for="" class="form-label">Nomor Telfon</label>
                        <input name="nomorTelfon" type="string" class="form-control" id="formGroupExampleInput" placeholder="Input Nomor Telfon">
                    </div>
                    @error('nomorTelfon')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-4">
                        <label for="" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Input Password">
                    </div>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
 
                    <button type="submit" class="btn btn-primary">Buat akun</button>
                    <small>Sudah memiliki akun? <a href="/login">Login Di sini!</a></small>
                </form>
            </div>
        </div>
    </div>

@endsection