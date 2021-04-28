@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>University Fee</h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  <div class="box box-primary">
    <div class="box-body">
        {!! Form::model($universityFee, ['route' => ['university-fees.update', $universityFee->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
        @include('university_fees.fields')
        {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
