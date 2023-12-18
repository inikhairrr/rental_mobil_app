@include('header')

    <h2>Pengembalian Mobil</h2>

    <form method="post" action="{{ route('mobil.prosesPengembalian') }}">
        @csrf

        <label for="nomor_sim">Nomor SIM:</label>
        <input type="text" name="nomor_sim" required>

        <label for="nomor_plat">Nomor Plat Mobil:</label>
        <input type="text" name="nomor_plat" required>

        <button type="submit">Kembalikan Mobil</button>
    </form>

@include('footer')