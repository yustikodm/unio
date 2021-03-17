@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pegawai
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-header with-header">
                <div class="col-sm-12">
                    <h4>Data</h4>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pegawai.store']) !!}
                    @include('pegawai.fields')                    
                </div>
            </div>
        </div>
        
        <div class="box box-primary">
            <div class="box-header with-header">
                <div class="col-sm-12">
                    <h4>Akun</h4>
                </div>
            </div>
            <div class="box-body">
                <div class="row">                    
                    <div class="col-sm-12 col-md-12 col-lg-6">                        
                        <div class="form-group">
                            {!! Form::label('name', 'Name:*') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Email:*') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-sm-12 col-md-12 col-lg-6">                        
                        <div class="form-group">
                            {!! Form::label('password', 'New Password:*') !!}
                            <input type="password" name="password" id="password" class="form-control" required="true">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password:*') !!}
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="true">
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-sm-12 col-md-12 col-lg-6">                        
                        <div class="form-group">
                            {!! Form::label('role_id', 'Role Akun:*') !!}
                            {!! Form::select('role_id', $roleItems ,null, ['class' => 'select2 form-control']) !!}
                        </div>
                    </div>              
                </div>
            </div>
        </div>
        
        <div class="box box-primary">            
            <div class="box-body">
                <div class="row">                   
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('pegawai.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
