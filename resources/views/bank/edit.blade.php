@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bank
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bank, ['route' => ['bank.update', $bank->id], 'method' => 'patch']) !!}

                        @include('bank.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection