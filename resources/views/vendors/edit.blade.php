@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Vendor</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($vendor, ['route' => ['vendors.update', $vendor->id], 'method' => 'patch', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
            @include('vendors.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
