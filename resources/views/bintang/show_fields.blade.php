<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $bintang->user_id }}</p>
</div>

<!-- Bintang Field -->
<div class="form-group">
    {!! Form::label('bintang', 'Bintang:') !!}
    <p>{{ $bintang->bintang }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bintang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bintang->updated_at }}</p>
</div>

