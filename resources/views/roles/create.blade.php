@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Role</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'roles.store', 'class' => 'form-horizontal']) !!}
                    @include('roles.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
