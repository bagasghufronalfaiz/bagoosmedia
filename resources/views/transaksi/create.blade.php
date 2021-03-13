@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Buat Transaksi') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('store.transaksi') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input class="form-control" id="Tanggal" placeholder="Tanggal Transaksi" type="date" value="{{ date('m/d/Y') }}" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Transaksi Masuk / Keluar</label>
                            <select class="form-control" id="keterangan" name="keterangan">
                                <option value="Masuk">Masuk</option>
                                <option value="Keluar">Keluar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="barang">Nama Barang</label>
                            <select class="form-control" id="barang" name="barang">
                                @foreach ($user->barangs as $barang)
                                <option value="{{$barang->kode_barang}}">{{$barang->nama_barang}} ~ {{$barang->kode_barang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="Jumlah" name="jumlah" placeholder="Jumlah">
                        </div>
                        <button type="submit" class="btn btn-primary">SUbmit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection