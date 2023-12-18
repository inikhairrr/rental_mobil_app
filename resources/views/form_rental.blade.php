@include('header')

    <h2>Peminjaman Mobil</h2>

<p>Mobil: {{ $mobil->merek }} - {{ $mobil->model }} (Nomor Plat: {{ $mobil->nomor_plat }})</p>

<form method="post" action="{{ route('mobil.storeRental', ['mobilId' => $mobil->id]) }}">
    @csrf

    <label for="nomor_sim">Nomor SIM:</label>
    <input type="text" name="nomor_sim" required>

    <label for="tanggal_mulai">Tanggal Mulai:</label>
    <input type="date" name="tanggal_mulai" required>

    <label for="tanggal_selesai">Tanggal Selesai:</label>
    <input type="date" name="tanggal_selesai" required>

    <button type="submit">Ajukan Peminjaman</button>
</form>

@include('footer')