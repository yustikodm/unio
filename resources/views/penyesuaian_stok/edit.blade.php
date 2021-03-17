@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penyesuaian Stok
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penyesuaianStok, ['route' => ['penyesuaianStok.update', $penyesuaianStok->id], 'method' => 'patch']) !!}

                        @include('penyesuaian_stok.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection