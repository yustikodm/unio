@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vendor Service
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vendorService, ['route' => ['vendor-services.update', $vendorService->id], 'method' => 'patch']) !!}

                        @include('vendor_services.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection