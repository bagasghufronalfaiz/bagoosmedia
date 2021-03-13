@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Transaksi') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('update.transaksi', ['id' => $transaksi->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input class="form-control" id="Tanggal" placeholder="Tanggal Transaksi" type="date" value="{{ date('m/d/Y') }}" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Transaksi Masuk / Keluar</label>
                            <select class="form-control" id="keterangan" name="keterangan">
                                <option @if ($transaksi->keterangan == "Masuk" ) selected @endif value="Masuk">Masuk</option>
                                <option @if ($transaksi->keterangan == "Keluar" ) selected @endif value="Keluar">Keluar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="barang">Nama Barang</label>
                            <select class="form-control" id="barang" name="barang" disabled>
                                @foreach ($user->barangs as $barang)
                                <option @if ($transaksi->barang_id == $barang->id ) selected @endif value="{{$barang->kode_barang}}">{{$barang->nama_barang}} ~ {{$barang->kode_barang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="{{(old('jumlah')) ? old('jumlah') : $transaksi->jumlah}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection