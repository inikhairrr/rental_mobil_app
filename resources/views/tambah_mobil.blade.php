@include('header')

    <h2>Tambah Mobil</h2>

    <form method="post" action="{{ route('mobil.storeMobil') }}">
        @csrf
        <div class="mb-3">
        <label class="form-label" for="merek">Merek:</label>
        <input class="form-control" type="text" name="merek" required>
        </div>
        <div class="mb-3">
        <label class="form-label" for="model">Model:</label>
        <input class="form-control" type="text" name="model" required>
        </div>
        <div class="mb-3">
        <label class="form-label" for="nomor_plat">Nomor Plat:</label>
        <input class="form-control" type="text" name="nomor_plat" required>
        </div>
        <div class="mb-3">
        <label class="form-label" for="tarif_sewa">Tarif Sewa per Hari:</label>
        <input class="form-control" type="text" name="tarif_sewa" required>
        </div>
        <button class="btn btn-primary" type="submit">Tambah Mobil</button>
    </form>

@include('footer')
