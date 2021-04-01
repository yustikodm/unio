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
        {!! Form::open(['route' => 'university-requirements.store']) !!}

        @include('university_requirements.fields')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
