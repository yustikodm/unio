<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $country->name }}</p>
</div>

<!-- Currency Code Field -->
<div class="form-group">
    {!! Form::label('currency_code', 'Currency Code:') !!}
    <p>{{ $country->currency_code }}</p>
</div>

<!-- Currency Name Field -->
<div class="form-group">
    {!! Form::label('currency_nam', 'Currency Name:') !!}
    <p>{{ $country->currency_name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $country->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $country->updated_at }}</p>
</div>