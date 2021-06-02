<!-- Major Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('major_id', 'Major Id:') !!}
    {!! Form::text('major_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Major Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('major_name', 'Major Name:') !!}
    {!! Form::text('major_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Fos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fos', 'Fos:') !!}
    {!! Form::text('fos', null, ['class' => 'form-control']) !!}
</div>

<!-- Fos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('man_check', 'Man Check:') !!}
    <input type="hidden" name="man_check" value="UNCHECK" />
    @if(Request::is('majorPrediction/*/edit'))
        @if($majorPrediction->man_check !== "CHECKED")
            {!! Form::checkbox('man_check', "CHECKED", ['class' => 'form-control']) !!}
        @else
            {!! Form::checkbox('man_check', "CHECKED", ['class' => 'form-control', 'checked' => 'checked']) !!}
        @endif    
    @else
        {!! Form::checkbox('man_check', "CHECKED", ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('majorPrediction.index') }}" class="btn btn-default">Cancel</a>
</div>
