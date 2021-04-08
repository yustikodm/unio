<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', 'web', ['class' => 'form-control','maxlength' => 255]) !!}
</div>

@if(Request::is('permissions/*/edit'))
@else
<div class="form-group col-sm-6">
    {!! Form::hidden('resource', 0) !!}
    {!! Form::checkbox('resource', 1, null) !!}
    {!! Form::label('resource', 'Resource', ['class' => 'control-label text-right']) !!}
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
</div>
