@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            {{ __('Dashboard') }}
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <a class="btn btn-primary btn-sm" href="{{route('export.transaksi')}}" role="button">{{ __('Export Transaksi ke csv') }}</a>
                            <a class="btn btn-primary btn-sm" href="{{route('export.barang')}}" role="button">{{ __('Export Barang ke csv') }}</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection