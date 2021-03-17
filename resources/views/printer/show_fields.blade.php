<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $printer->nama }}</p>
</div>

<!-- Default Field -->
<div class="form-group">
    {!! Form::label('default', 'Default:') !!}
    <p>{{ $printer->default }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $printer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $printer->updated_at }}</p>
</div>

