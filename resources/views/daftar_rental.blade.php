@include('header')

    <h2>Daftar Mobil yang Sedang Disewa</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Id Mobil</th>
        <th scope="col">Nomor SIM Penyewa</th>
        <th scope="col">Tanggal Mulai</th>
        <th scope="col">Tanggal Selesai</th>
      </tr>
    </thead>
    <tbody>        
        @foreach($rentals as $rental)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $rental->mobil_id }}</td>
            <td>{{ $rental->user_id }}</td>
            <td>{{ $rental->tanggal_mulai }}</td>
            <td>{{ $rental->tanggal_selesai }}<</td>
        </tr>
        @endforeach      
    </tbody>
</table>

@include('footer')
