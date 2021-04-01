@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vendor Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vendorCategory, ['route' => ['vendor-categories.update', $vendorCategory->id], 'method' => 'patch']) !!}

                        @include('vendor_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection