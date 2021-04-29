<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p><a href="{{ route('countries.show', $pointTopup->country->id) }}">{{ $pointTopup->country->name }}</a></p>
</div>

<!-- User ID Field -->
<div class="form-group">
    {!! Form::label('username', 'User ID:') !!}
    <p><a href="{{ route('users.show', $pointTopup->user->id) }}">{{ $pointTopup->user->username }}</a></p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $pointTopup->amount }}</p>
</div>

<!-- Point Conversion Field -->
<div class="form-group">
    {!! Form::label('point_conversion', 'Point Conversion:') !!}
    <p>{{ $pointTopup->point_conversion }}</p>
</div>

<!-- Payment Proof Field -->
<div class="form-group">
    {!! Form::label('payment_proof', 'Payment Proof:') !!}
    <br>
    <img style="width: 25%" src="{{ asset('storage/points/'.$pointTopup->payment_proof) }}">
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pointTopup->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pointTopup->updated_at }}</p>
</div>