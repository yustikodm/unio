@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kartu Stok Terima Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kartuStokTerimaBarang, ['route' => ['kartuStokTerimaBarang.update', $kartuStokTerimaBarang->id], 'method' => 'patch']) !!}

                        @include('kartu_stok_terima_barang.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection