<!-- Vendor Id Field -->
<div class="form-group">
    {!! Form::label('vendor_id', 'Vendor Id:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('vendor_id', $vendorItems, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Birthdate Field -->
<div class="form-group">
    {!! Form::label('birthdate', 'Birthdate:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::date('birthdate', null, ['class' => 'form-control','id'=>'birthdate']) !!}
    </div>
</div>

<!-- Position Field -->
<div class="form-group">
    {!! Form::label('position', 'Position:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('position', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::file('picture', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('vendor-employees.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $('#birthdate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
        , useCurrent: false
    })

</script>
@endpush
