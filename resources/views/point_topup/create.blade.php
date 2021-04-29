@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Point Topup</h1>
</section>

<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'point-topup.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
            @include('point_topup.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
