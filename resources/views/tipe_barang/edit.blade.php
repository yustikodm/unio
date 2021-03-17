@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipe Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipeBarang, ['route' => ['tipeBarang.update', $tipeBarang->id], 'method' => 'patch']) !!}

                        @include('tipe_barang.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection