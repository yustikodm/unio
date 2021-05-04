<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Due Date Field -->
<div class="form-group">
    {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::date('due_date', null, ['class' => 'form-control','id'=>'due_date']) !!}
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#due_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('topup-packages.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
