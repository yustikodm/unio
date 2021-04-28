@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>District</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($district, ['route' => ['districts.update', $district->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('districts.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
