@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Retur Barang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                
                <div class="row" style="padding-left: 20px; padding-right: 20px">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        @include('retur_barang.show_fields')
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        @include('retur_barang.show_fieldbl')
                    </div>                    
                </div>
                <div class="row" style="padding-left: 20px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('returBarang.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>               

            </div>
        </div>
    </div>
@endsection
