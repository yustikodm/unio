@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Harga
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($harga, ['route' => ['harga.update', $harga->id], 'method' => 'patch']) !!}

                        @include('harga.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection