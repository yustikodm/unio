@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Log Bonus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logBonus, ['route' => ['logBonus.update', $logBonus->id], 'method' => 'patch']) !!}

                        @include('log_bonus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection