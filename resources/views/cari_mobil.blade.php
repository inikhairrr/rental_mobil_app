@include('header')

    <h2>Cari Mobil</h2>

    <form method="get" action="{{ route('mobil.searchMobil') }}">
        <label for="keyword">Cari Mobil:</label>
        <input type="text" name="keyword" required>
        <button type="submit">Cari</button>
    </form>

    @if(isset($mobil))
        @if($mobil->count() > 0)
            <ul>
                @foreach($mobil as $m)
                    <li>
                        {{ $m->merek }} - {{ $m->model }} ({{ $m->tersedia ? 'Tersedia' : 'Tidak Tersedia' }})
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada hasil pencarian.</p>
        @endif
    @endif

@include('footer')