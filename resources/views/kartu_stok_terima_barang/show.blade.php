@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kartu Stok Terima Barang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('kartu_stok_terima_barang.show_fields')
                    <a href="{{ route('kartuStokTerimaBarang.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
