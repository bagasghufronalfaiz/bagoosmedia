@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ubah Data Barang') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('update.barang', ['id' => $barang->kode_barang]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="KodeBarang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="KodeBarang" name="KodeBarang" placeholder="Kode Barang" value="{{(old('KodeBarang')) ? old('KodeBarang') : $barang->kode_barang}}">
                        </div>
                        <div class="mb-3">
                            <label for="NamaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang" value="{{(old('NamaBarang')) ? old('NamaBarang') : $barang->nama_barang}}">
                        </div>
                        <div class=" mb-3">
                            <label for="Satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="Satuan" name="Satuan" placeholder="Satuan" value="{{(old('Satuan')) ? old('Satuan') : $barang->satuan}}">
                        </div>
                        <div class=" mb-3">
                            <label for="HargaBeli" class="form-label">Harga Beli</label>
                            <input type="number" class="form-control" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli" value="{{(old('HargaBeli')) ? old('HargaBeli') : $barang->harga_beli}}">
                        </div>
                        <div class=" mb-3">
                            <label for="HargaJual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="HargaJual" name="HargaJual" placeholder="Harga Jual" value="{{(old('HargaJual')) ? old('HargaJual') : $barang->harga_jual}}">
                        </div>
                        <div class=" mb-3">
                            <label for="Pemasok" class="form-label">Pemasok</label>
                            <input type="text" class="form-control" id="Pemasok" name="Pemasok" placeholder="Pemasok" value="{{(old('Pemasok')) ? old('Pemasok') : $barang->pemasok}}">
                        </div>
                        <button type=" submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection