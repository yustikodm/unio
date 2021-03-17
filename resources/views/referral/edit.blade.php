@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Referral
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($referral, ['route' => ['referral.update', $referral->id], 'method' => 'patch']) !!}

                        @include('referral.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection