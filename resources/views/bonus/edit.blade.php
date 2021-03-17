@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bonus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bonus, ['route' => ['bonus.update', $bonus->id], 'method' => 'patch']) !!}

                        @include('bonus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection