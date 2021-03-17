@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipe Parameter
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipeParameter, ['route' => ['tipeParameter.update', $tipeParameter->id], 'method' => 'patch']) !!}

                        @include('tipe_parameter.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection