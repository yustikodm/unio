@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Terima Barang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        @include('terima_barang.show_fields')
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12" >
                        @include('terima_barang.show_fieldbl')
                    </div>    
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        @include('terima_barang.show_fieldbt')
                    </div>                       
                </div>
                <div class="row" style="padding-left: 20px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('terimaBarang.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>               
            </div>
        </div>
    </div>
@endsection
