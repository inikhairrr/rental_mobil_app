<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Rental Mobil App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              
              @if(session('nomor_sim'))
                <li class="nav-item">
                  <a class="nav-link" href="{{route('logout_pelanggan.prosesLogout')}}">Logout</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('login_pelanggan.formLogin')}}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('registrasi_pelanggan.addPelanggan')}}">Register</a>
                </li>
              @endif
              
              

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('mobil.listMobil')}}">Daftar Mobil</a></li>
                    <li><a class="dropdown-item" href="{{route('mobil.searchMobil')}}">Cari Mobil</a></li>
                    <li><a class="dropdown-item" href="{{route('mobil.addMobil')}}">Tambah Mobil</a></li>                                    
                    <li><a class="dropdown-item" href="{{route('mobil.daftarRental')}}">Daftar Rental</a></li>                  
                    <li><a class="dropdown-item" href="{{route('mobil.formPengembalian')}}">Pengembalian</a></li>
                </ul>
              </li>
              @if(session('nomor_sim'))
                <li class="nav-item">
                  <p class="nav-link" >Hai {{ session('nama') }}, ({{ session('nomor_sim') }})</p>
                </li>
              @endif
            </ul>
            
          </div>
        </div>
      </nav>

    @if(session('success'))
        <div class="alert alert-success">
            <h1>{{ session('success') }}</h1>
        </div>
    @endif

    <div class="container">
