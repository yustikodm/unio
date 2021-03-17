@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            University Requirement
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($universityRequirement, ['route' => ['universityRequirements.update', $universityRequirement->id], 'method' => 'patch']) !!}

                        @include('university_requirements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection