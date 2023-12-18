@include('header')

    <h2>Pengembalian Mobil</h2>

    <form method="post" action="{{ route('mobil.prosesPengembalian') }}">
        @csrf
        <div class="mb-3">
        <label class="form-label" for="nomor_sim">Nomor SIM:</label>
        <input class="form-control" type="text" name="nomor_sim" required>
        </div>
        <div class="mb-3">
        <label class="form-label" for="nomor_plat">Nomor Plat Mobil:</label>
        <input class="form-control" type="text" name="nomor_plat" required>
        </div>
        <button class="btn btn-primary" type="submit">Kembalikan Mobil</button>
    </form>

@include('footer')
