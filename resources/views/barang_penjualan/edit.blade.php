@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Barang Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($barangPenjualan, ['route' => ['barangPenjualan.update', $barangPenjualan->id], 'method' => 'patch']) !!}

                        @include('barang_penjualan.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection