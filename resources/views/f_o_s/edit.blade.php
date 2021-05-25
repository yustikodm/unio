@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            F O S
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fOS, ['route' => ['fOS.update', $fOS->id], 'method' => 'patch']) !!}

                        @include('f_o_s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection