@include('header')

    <form method="post" action="{{ route('registrasi_pelanggan.storePelanggan') }}">
        @csrf
    
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
    
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>
    
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" required>
    
        <label for="nomor_sim">Nomor SIM:</label>
        <input type="text" name="nomor_sim" required>
                    
        <button type="submit">Daftar</button>
    </form>

@include('footer')