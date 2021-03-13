@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Masukkan Data Barang') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('store.barang') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="KodeBarang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="KodeBarang" name="KodeBarang" placeholder="Kode Barang">
                        </div>
                        <div class="mb-3">
                            <label for="NamaBarang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang">
                        </div>
                        <div class="mb-3">
                            <label for="Satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="Satuan" name="Satuan" placeholder="Satuan">
                        </div>
                        <div class="mb-3">
                            <label for="HargaBeli" class="form-label">Harga Beli</label>
                            <input type="number" class="form-control" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli">
                        </div>
                        <div class="mb-3">
                            <label for="HargaJual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="HargaJual" name="HargaJual" placeholder="Harga Jual">
                        </div>
                        <div class="mb-3">
                            <label for="Pemasok" class="form-label">Pemasok</label>
                            <input type="text" class="form-control" id="Pemasok" name="Pemasok" placeholder="Pemasok">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection