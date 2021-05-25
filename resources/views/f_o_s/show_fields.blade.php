<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $fOS->name }}</p>
</div>

<!-- Cip Field -->
<div class="form-group">
    {!! Form::label('cip', 'Cip:') !!}
    <p>{{ $fOS->cip }}</p>
</div>

<!-- Hc Field -->
<div class="form-group">
    {!! Form::label('hc', 'Hc:') !!}
    <p>{{ $fOS->hc }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fOS->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fOS->updated_at }}</p>
</div>

