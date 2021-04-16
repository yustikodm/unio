@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    University Scholarship
  </h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  <div class="box box-primary">
    <div class="box-body">
      <div class="row">
        {!! Form::model($universityScholarship, ['route' => ['university-scholarships.update', $universityScholarship->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

        @include('university_scholarships.fields')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
