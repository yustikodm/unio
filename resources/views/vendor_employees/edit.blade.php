@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Vendor Employee</h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($vendorEmployee, ['route' => ['vendor-employees.update', $vendorEmployee->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            @include('vendor_employees.fields')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
