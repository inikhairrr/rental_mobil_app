@include('header')

    <h2>Login Pelanggan</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="post" action="{{ route('login_pelanggan.prosesLogin') }}">
        @csrf

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="nomor_sim">Nomor SIM:</label>
        <input type="text" name="nomor_sim" required>

        <button type="submit">Login</button>
    </form>

@include('footer')