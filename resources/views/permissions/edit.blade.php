@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Permission</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('permissions.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
