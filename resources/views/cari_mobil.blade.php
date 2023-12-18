@include('header')    

    <form method="get" action="{{ route('mobil.searchMobil') }}">
        <label class="form-label" for="keyword">Cari Mobil:</label>
        <input class="form-control" type="text" name="keyword" required>
        <button class="btn btn-success" type="submit">Cari</button>
    </form>

    <h2>Hasil Pencarian:</h2>  

    @if(isset($mobil))
        @if($mobil->count() > 0)
            
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

        @else
            <p>Tidak ada hasil pencarian.</p>
        @endif
    @endif      

    
@include('footer')
