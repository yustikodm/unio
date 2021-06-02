@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Image Banner
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($imageBanner, ['route' => ['imageBanner.update', $imageBanner->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('image_banner.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection