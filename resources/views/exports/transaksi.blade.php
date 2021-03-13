<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Masuk / Keluar</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">No Faktur</th>
            <th scope="col">Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->transaksis as $transaksi)
        <tr>
            <td>{{$transaksi->tanggal}}</td>
            <td>{{$transaksi->keterangan}}</td>
            <td>{{$transaksi->barang->kode_barang}}</td>
            <td>{{$transaksi->jumlah}}</td>
            <td>{{$transaksi->barang->nama_barang}}</td>
            <td>{{$transaksi->no_faktur}}</td>
            <td>{{$transaksi->stok}}</td>
        </tr>
        @endforeach
    </tbody>
</table>