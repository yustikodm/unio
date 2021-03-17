@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mitra
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       {!! Form::model($mitra, ['route' => ['mitra.update', $mitra->id], 'method' => 'patch']) !!}

            @include('mitra.fields')

       {!! Form::close() !!}
   </div>
@endsection