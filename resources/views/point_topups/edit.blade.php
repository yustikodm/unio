@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Point Topup
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pointTopup, ['route' => ['pointTopups.update', $pointTopup->id], 'method' => 'patch']) !!}

                        @include('point_topups.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection