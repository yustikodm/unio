@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>University Requirement</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($universityRequirement, ['route' => ['university-requirements.update', $universityRequirement->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('university_requirements.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
