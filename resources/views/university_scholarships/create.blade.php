@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>University Scholarship</h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  <div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'university-scholarships.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
        @include('university_scholarships.fields')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
