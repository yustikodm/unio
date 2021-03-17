@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Metode Pembayaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($metodePembayaran, ['route' => ['metodePembayaran.update', $metodePembayaran->id], 'method' => 'patch']) !!}

                        @include('metode_pembayaran.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection