<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $imageBanner->name }}</p>
</div>

<!-- Src Field -->
<div class="form-group">
    {!! Form::label('src', 'Src:') !!}
    <p>{{ $imageBanner->src }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $imageBanner->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $imageBanner->updated_at }}</p>
</div>

