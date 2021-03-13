<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Pemasok</th>
            <th scope="col">Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->barangs as $barang)
        <tr>
            <td>{{$barang->kode_barang}}</td>
            <td>{{$barang->nama_barang}}</td>
            <td>{{$barang->satuan}}</td>
            <td>{{$barang->harga_beli}}</td>
            <td>{{$barang->harga_jual}}</td>
            <td>{{$barang->pemasok}}</td>
            <td>{{$barang->stok}}</td>
        </tr>
        @endforeach
    </tbody>
</table>