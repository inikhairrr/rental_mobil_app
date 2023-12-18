@include('header')

    <h2>Login Pelanggan</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="post" action="{{ route('login_pelanggan.prosesLogin') }}">
        @csrf
        <div class="mb-3">
        <label class="form-label" for="nama">Nama:</label>
        <input class="form-control" type="text" name="nama" required>
        </div>
        <div class="mb-3">
        <label class="form-label" for="nomor_sim">Nomor SIM:</label>
        <input class="form-control" type="text" name="nomor_sim" required>
        </div>
        
        <button class="btn btn-primary" type="submit">Login</button>
        
    </form>

@include('footer')
