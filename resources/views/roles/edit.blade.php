@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Role</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('roles.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
