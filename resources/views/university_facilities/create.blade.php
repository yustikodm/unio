@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>University Facility</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'university-facilities.store', 'class' => 'form-horizontal']) !!}
            @include('university_facilities.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
