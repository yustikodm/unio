<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <br>
    <img style="width: 25%" src="{{ asset('storage/vendors/'.$vendor->picture) }}" alt="">
</div>

<!-- Vendor Category Id Field -->
<div class="form-group">
    {!! Form::label('vendor_category_id', 'Vendor Category Id:') !!}
    <p>{{ $vendor->category->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $vendor->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $vendor->description }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $vendor->email }}</p>
</div>

<!-- Back Account Number Field -->
<div class="form-group">
    {!! Form::label('back_account_number', 'Back Account Number:') !!}
    <p>{{ $vendor->back_account_number }}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $vendor->website }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $vendor->address }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $vendor->phone }}</p>
</div>

