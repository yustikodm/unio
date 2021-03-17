@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kartu Stok Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kartuStokPenjualan, ['route' => ['kartuStokPenjualan.update', $kartuStokPenjualan->id], 'method' => 'patch']) !!}

                        @include('kartu_stok_penjualan.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection