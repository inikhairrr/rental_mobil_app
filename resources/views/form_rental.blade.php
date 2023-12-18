@include('header')

    <h2>Peminjaman Mobil</h2>

<p>Mobil: {{ $mobil->merek }} - {{ $mobil->model }} (Nomor Plat: {{ $mobil->nomor_plat }})</p>

<form method="post" action="{{ route('mobil.storeRental', ['mobilId' => $mobil->id]) }}">
    @csrf
    <div class="mb-3">
    <label class="form-label" for="nomor_sim">Nomor SIM:</label>
    <input class="form-control" type="text" name="nomor_sim" required>
    </div>
    <div class="mb-3">
    <label class="form-label" for="tanggal_mulai">Tanggal Mulai:</label>
    <input class="form-control" type="date" name="tanggal_mulai" required>
    </div>
    <div class="mb-3">
    <label class="form-label" for="tanggal_selesai">Tanggal Selesai:</label>
    <input class="form-control" type="date" name="tanggal_selesai" required>
    </div>
    <button class="btn btn-primary" type="submit">Ajukan Peminjaman</button>
</form>

@include('footer')
