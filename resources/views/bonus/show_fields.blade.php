<!-- Mitra Id Field -->
<div class="form-group">
    {!! Form::label('mitra_id', 'Mitra Id:') !!}
    <p>{{ $bonus->mitra_id }}</p>
</div>

<!-- Bonus Field -->
<div class="form-group">
    {!! Form::label('bonus', 'Bonus:') !!}
    <p>{{ $bonus->bonus }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bonus->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bonus->updated_at }}</p>
</div>

