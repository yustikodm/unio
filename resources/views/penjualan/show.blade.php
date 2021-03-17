@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penjualan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('penjualan.show_fields')             
                </div>                                                                                      
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-sm-12">
                    <h4>Barang</h4>
                </div>
            </div>  
            <div class="box-body">
                <div class="row">                    
                    <div class="col-lg-6 col-md-6 col-sm-12" >
                        @include('penjualan.show_blistr')
                    </div>
                    @if(count($barangPenjualanPaket) != 0)  
                    <div class="col-lg-6 col-md-6 col-sm-12" >
                        @include('penjualan.show_blistp')
                    </div>                        
                    @endif
                </div>                               
            </div>
            <div class="box-footer">
                <div class="row">                    
                    <div class="col-sm-12" >
                        <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                    </div>                   
                </div>                               
            </div>
        </div>
    </div>
@endsection