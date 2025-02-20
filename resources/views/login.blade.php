@extends('layouts.main')

@section('container')

    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('User Login') }} </div>
            <div class="card-body">
                <form action="/login" method="POST" enctype="multipart/form-data">
                   
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Input Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Input Password" value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
 
                    <button type="submit" class="btn btn-primary">Insert</button>

                    <small>Belum membuat akun? <a href="/registrasi">Registeri di sini!</a></small>
 
                </form>
            </div>
        </div>
    </div>

@endsection