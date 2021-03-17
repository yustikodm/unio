@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mutasi Kas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mutasiKas, ['route' => ['mutasiKas.update', $mutasiKas->id], 'method' => 'patch']) !!}

                        @include('mutasi_kas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection