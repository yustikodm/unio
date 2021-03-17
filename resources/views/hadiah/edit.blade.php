@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hadiah
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hadiah, ['route' => ['hadiah.update', $hadiah->id], 'method' => 'patch']) !!}

                        @include('hadiah.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection