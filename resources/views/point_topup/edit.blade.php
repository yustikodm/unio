@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Point Topup
  </h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  <div class="box box-primary">
    <div class="box-body">
      <div class="row">
        {!! Form::model($pointTopup, ['route' => ['point-topup.update', $pointTopup->id], 'method' => 'patch', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

        @include('point_topup.fields')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
