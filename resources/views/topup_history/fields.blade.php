<!-- User ID Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-5">
        {!! Form::select('user_id', $userItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $countryItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Point Conversion Field -->
<div class="form-group">
    {!! Form::label('point_conversion', 'Point Conversion:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('point_conversion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Payment Proof Field -->
<div class="form-group">
    {!! Form::label('payment_proof', 'Payment Proof:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::file('payment_proof', ['accept' => 'image/*']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('topup-history.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
