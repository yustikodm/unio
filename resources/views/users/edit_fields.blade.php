<!-- Name Field -->
<div class="form-group">
    {!! Form::label('username', 'Name:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::text('username', null, ['id'=>'username', 'class' => 'form-control', 'required']) !!}
    </div>
</div>
<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control', 'required']) !!}
    </div>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'New Password:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::password('password', ['class' => 'form-control input-group__addon', 'id' => 'pfNewPassword']) !!}
    </div>
</div>

<!-- Password Confirmation Field -->
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control input-group__addon', 'id' => 'pfNewConfirmPassword']) !!}
    </div>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::number('phone', null, ['id'=>'phone','class' => 'form-control']) !!}
    </div>
</div>

<!-- Image Path Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        <div class="input-group-btn">
            <div class="col-sm-1" style="width: 11.333333%;">
                <span class="btn btn-primary btn-file" style="margin-right: 5px;margin-left: -17px;">
                    <div id="lb">Upload</div>
                    {!! Form::file('image_path',['id'=>'image_path', 'accept'=>'image/*']) !!}
                </span>
            </div>
        </div>
        <div class="text-right" style="margin-top: -55px; margin-right: 170px;">
            <img id='edit_preview_photos' class="img-thumbnail" width="100px;" src="{{asset($user->image_path)}}" />
        </div>
    </div>
</div>

<!-- Roles Field -->
<div class="form-group">
    {!! Form::label('roles', 'Roles:', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-6">
        {!! Form::select('roles[]', $roleItems, $user->roles->pluck('name', 'name')->toArray(), ['class' => 'select2 form-control', 'multiple']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
    </div>
</div>
