@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Pricing Point
  </h1>
</section>
<div class="content">
  @include('adminlte-templates::common.errors')
  <div class="box box-primary">
    <div class="box-body">
      <div class="row">
        {!! Form::model($pricingPoint, ['route' => ['pricing-points.update', $pricingPoint->id], 'method' => 'patch']) !!}

        @include('pricing_points.fields')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
