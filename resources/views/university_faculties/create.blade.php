@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>University Faculties</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'university-faculties.store', 'class' => 'form-horizontal']) !!}
            @include('university_faculties.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
