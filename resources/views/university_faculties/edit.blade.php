@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            University Faculties
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($universityFaculties, ['route' => ['universityFaculties.update', $universityFaculties->id], 'method' => 'patch']) !!}

                        @include('university_faculties.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection