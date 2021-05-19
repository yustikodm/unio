@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Review Majors
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($reviewMajors, ['route' => ['reviewMajors.update', $reviewMajors->id], 'method' => 'patch']) !!}

                        @include('review_majors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection