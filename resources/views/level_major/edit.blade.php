@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Level Major
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($levelMajor, ['route' => ['levelMajor.update', $levelMajor->id], 'method' => 'patch']) !!}

                        @include('level_major.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection