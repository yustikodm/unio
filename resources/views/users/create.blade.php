@extends('layouts.app')
@section('title', 'Users')

@section('content')
    <section class="content-header">
        <h1>
            Pengguna
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection