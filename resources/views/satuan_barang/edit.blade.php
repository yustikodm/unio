@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Satuan Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($satuanBarang, ['route' => ['satuanBarang.update', $satuanBarang->id], 'method' => 'patch']) !!}

                        @include('satuan_barang.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection