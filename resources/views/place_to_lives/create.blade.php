@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Place To Live
  </h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  <div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'place-to-live.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
        @include('place_to_lives.fields')
        {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
