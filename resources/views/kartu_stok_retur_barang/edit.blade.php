@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kartu Stok Retur Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kartuStokReturBarang, ['route' => ['kartuStokReturBarang.update', $kartuStokReturBarang->id], 'method' => 'patch']) !!}

                        @include('kartu_stok_retur_barang.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection