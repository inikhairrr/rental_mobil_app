@include('header')

    <form method="post" action="{{ route('mobil.storeMobil') }}">
        @csrf
    
        <label for="merek">Merek:</label>
        <input type="text" name="merek" required>
    
        <label for="model">Model:</label>
        <input type="text" name="model" required>
    
        <label for="nomor_plat">Nomor Plat:</label>
        <input type="text" name="nomor_plat" required>
    
        <label for="tarif_sewa">Tarif Sewa per Hari:</label>
        <input type="text" name="tarif_sewa" required>
    
        <button type="submit">Tambah Mobil</button>
    </form>

@include('footer')