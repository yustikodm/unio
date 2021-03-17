@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mitra
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'mitra.store']) !!}

            @include('mitra.fields')

        {!! Form::close() !!}
    </div>
@endsection
