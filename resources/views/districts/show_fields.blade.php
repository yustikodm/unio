<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:') !!}
    <p>{{ $district->state->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $district->name }}</p>
</div>

