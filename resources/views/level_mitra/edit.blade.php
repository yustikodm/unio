@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Level Mitra
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($levelMitra, ['route' => ['levelMitra.update', $levelMitra->id], 'method' => 'patch']) !!}

                        @include('level_mitra.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection