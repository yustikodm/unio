@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Satuan Barang</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('satuan_barang.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

