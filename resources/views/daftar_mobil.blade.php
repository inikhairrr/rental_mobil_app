@include('header')

    <h2>Daftar Mobil</h2>    

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Merek</th>
            <th scope="col">Model</th>
            <th scope="col">Status</th>            
          </tr>
        </thead>
        <tbody>        
            @foreach($mobil as $m)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $m->merek }}</td>
                <td>{{ $m->model }}</td>
                <td>
                    ({{ $m->tersedia ? 'Tersedia' : 'Tidak Tersedia' }})
                    @if($m->tersedia)                        
                            <a class="btn btn-primary" href="{{ route('mobil.formRental', ['mobilId' => $m->id]) }}">Pesan</a>                                                   
                    @endif
                </td>                
            </tr>
            @endforeach      
        </tbody>
    </table>

@include('footer')
