<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $review->user_id }}</p>
</div>

<!-- Entity Id Field -->
<div class="form-group">
    {!! Form::label('entity_id', 'Entity Id:') !!}
    <p>{{ $review->entity_id }}</p>
</div>

<!-- Entity Name Field -->
<div class="form-group">
    {!! Form::label('entity_name', 'Entity Name:') !!}
    <p>{{ $review->entity_name }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $review->message }}</p>
</div>

<!-- Rating Field -->
<div class="form-group">
    {!! Form::label('rating', 'Rating:') !!}
    <p>{{ $review->rating }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $review->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $review->updated_at }}</p>
</div>

