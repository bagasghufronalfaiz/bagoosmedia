@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            {{ __('Data Barang') }}
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <a class="btn btn-primary btn-sm" href="{{route('create.barang')}}" role="button">{{ __('Buat Data Barang Baru') }}</a>
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
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Pemasok</th>
                                <th scope="col">Stok Akhir</th>
                                <th scope="col"></th>
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
                                <td style="text-align: right;">
                                    <a href="{{route('edit.barang', ['id' => $barang->kode_barang])}}" class="btn btn-warning btn-sm m-0" data-toggle="tooltip" title="Edit Barang">Edit</a>
                                    <form action="{{route('delete.barang', ['id' => $barang->kode_barang])}}" method="post" class="m-0" style="display:inline-block;">
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