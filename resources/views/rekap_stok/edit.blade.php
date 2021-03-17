@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rekap Stok
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rekapStok, ['route' => ['rekapStok.update', $rekapStok->id], 'method' => 'patch']) !!}

                        @include('rekap_stok.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection