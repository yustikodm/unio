@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Article</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'articles.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    @include('articles.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
