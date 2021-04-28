@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>University Facility</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($universityFacility, ['route' => ['university-facilities.update', $universityFacility->id], 'method' => 'patch', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
            @include('university_facilities.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
