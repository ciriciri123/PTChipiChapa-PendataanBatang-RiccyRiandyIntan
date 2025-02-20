<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <ul class="navbar-nav">
                @auth    
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/halamanUtama">Halaman Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/keranjang">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/order">Lihat Order</a>
                </li>
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/buat">Buat Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/kategori">Buat Kategori</a>
                </li>
                @endcan
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto me-5">

                @auth
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login"><button class="btn btn-primary">Login</button></a>
                </li>
                @endauth

            </ul>
        </div>
        </div>
    </div>
    </nav>

    <div class="container nt-5">
        @yield('container')
    </div>

</body>
</html>