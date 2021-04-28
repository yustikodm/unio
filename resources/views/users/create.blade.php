@extends('layouts.app')
@section('title', 'Users')

@section('content')
<section class="content-header">
    <h1>Users</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'users.store', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
            @include('users.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
