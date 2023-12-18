@include('header')

    <h2>Daftar Mobil yang Sedang Disewa</h2>

<ul>
    @foreach($rentals as $rental)
        <li>
            Id Mobil: {{ $rental->mobil_id }},
            Tanggal Mulai: {{ $rental->tanggal_mulai }},
            Tanggal Selesai: {{ $rental->tanggal_selesai }}
        </li>
    @endforeach
</ul>

@include('footer')