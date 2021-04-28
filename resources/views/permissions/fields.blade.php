<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>

<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Guard Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('guard_name', 'web', ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>


@if(Auth::user()->hasRole('admin') && !Request::is('permissions/*/edit'))
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::hidden('resource', 0) !!}
        {!! Form::checkbox('resource', 1, null, ['id' => 'resource']) !!}
        {!! Form::label('resource', 'Resource', ['class' => 'control-label text-right']) !!}
    </div>
</div>
@endif

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
