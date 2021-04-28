@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>University Faculties</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($university-faculties, ['route' => ['university-faculties.update', $university-faculties->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('university_faculties.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
