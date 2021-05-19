<!-- Major Id Field -->
<div class="form-group">
    {!! Form::label('major_id', 'Major Id:') !!}
    <p>{{ $majorPrediction->major_id }}</p>
</div>

<!-- Major Name Field -->
<div class="form-group">
    {!! Form::label('major_name', 'Major Name:') !!}
    <p>{{ $majorPrediction->major_name }}</p>
</div>

<!-- Fos Field -->
<div class="form-group">
    {!! Form::label('fos', 'Fos:') !!}
    <p>{{ $majorPrediction->fos }}</p>
</div>

<!-- Man Check Field -->
<div class="form-group">
    {!! Form::label('man_check', 'Man Check:') !!}
    <p>{{ $majorPrediction->man_check }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $majorPrediction->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $majorPrediction->updated_at }}</p>
</div>

