@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Users</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
            @include('users.edit_fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
