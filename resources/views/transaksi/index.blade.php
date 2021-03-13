@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            {{ __('Data Transaksi') }}
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <a class="btn btn-primary btn-sm" href="{{route('create.transaksi')}}" role="button">{{ __('Buat Transaksi Baru') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

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
                                <th scope="col"></th>
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
                                <td style="text-align: right;">
                                    <a href="{{route('edit.transaksi', ['id' => $transaksi->id])}}" class="btn btn-warning btn-sm m-0" data-toggle="tooltip" title="Edit Barang">Edit</a>
                                    <form action="{{route('delete.transaksi', ['id' => $transaksi->id])}}" method="post" class="m-0" style="display:inline-block;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Barang">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection