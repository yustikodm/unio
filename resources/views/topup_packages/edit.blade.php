@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Topup Package
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($topupPackage, ['route' => ['topupPackages.update', $topupPackage->id], 'method' => 'patch']) !!}

                        @include('topup_packages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection