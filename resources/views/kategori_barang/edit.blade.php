@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kategori Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kategoriBarang, ['route' => ['kategoriBarang.update', $kategoriBarang->id], 'method' => 'patch']) !!}

                        @include('kategori_barang.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection