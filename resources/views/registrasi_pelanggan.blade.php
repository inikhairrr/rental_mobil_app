@include('header')

    <form method="post" action="{{ route('registrasi_pelanggan.storePelanggan') }}">
        @csrf
        <div class="mb-3">
        <label class="form-label" for="nama">Nama:</label>
        <input class="form-control" type="text" name="nama" required>
        </div>
        <div class="mb-3">    
        <label class="form-label" for="alamat">Alamat:</label>
        <input class="form-control" type="text" name="alamat" required>
        </div>
        <div class="mb-3">    
        <label class="form-label" for="nomor_telepon">Nomor Telepon:</label>
        <input class="form-control" type="text" name="nomor_telepon" required>
        </div>
        <div class="mb-3">    
        <label class="form-label" for="nomor_sim">Nomor SIM:</label>
        <input class="form-control" type="text" name="nomor_sim" required>
        </div>            
        <button class="btn btn-primary" type="submit">Daftar</button>
    </form>

@include('footer')
