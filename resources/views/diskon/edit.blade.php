@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Diskon
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($diskon, ['route' => ['diskon.update', $diskon->id], 'method' => 'patch']) !!}

                        @include('diskon.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection