@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Printer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
                {!! Form::model($printer, ['route' => ['printer.update', $printer->id], 'method' => 'patch']) !!}

                    @include('printer.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection