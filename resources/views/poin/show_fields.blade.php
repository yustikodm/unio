<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $poin->user_id }}</p>
</div>

<!-- Poin Field -->
<div class="form-group">
    {!! Form::label('poin', 'Poin:') !!}
    <p>{{ $poin->poin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $poin->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $poin->updated_at }}</p>
</div>

