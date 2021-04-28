@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Religion</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($religion, ['route' => ['religions.update', $religion->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('religions.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
