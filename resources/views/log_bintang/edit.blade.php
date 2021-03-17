@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Log Bintang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logBintang, ['route' => ['logBintang.update', $logBintang->id], 'method' => 'patch']) !!}

                        @include('log_bintang.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection