@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Biodata
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($biodata, ['route' => ['biodata.update', $biodata->id], 'method' => 'patch']) !!}

                        @include('biodata.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection