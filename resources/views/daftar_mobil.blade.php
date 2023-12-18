@include('header')

    <h2>Daftar Mobil</h2>    

    <ul>
        @foreach($mobil as $m)
    <li>
        {{ $m->merek }} - {{ $m->model }}
        ({{ $m->tersedia ? 'Tersedia' : 'Tidak Tersedia' }})
        @if($m->tersedia)
            
                <a href="{{ route('mobil.formRental', ['mobilId' => $m->id]) }}">Pesan</a>
            
        @endif
    </li>
@endforeach
    </ul>

@include('footer')