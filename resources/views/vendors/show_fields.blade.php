<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <br>
    <img style="width: 25%" src="{{ asset('storage/vendors/'.$vendor->picture) }}" alt="">
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p><a href="{{ route('countries.show', $vendor->country->id) }}">{{ $vendor->country->name }}</a></p>
</div>

@if (!empty($vendor->state->name))
<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State:') !!}
    <p><a href="{{ route('states.show', $vendor->state->id) }}">{{ $vendor->state->name }}</a></p>
</div>
@endif

@if (!empty($vendor->district->name))
<!-- District Id Field -->
<div class="form-group">
    {!! Form::label('district_id', 'District:') !!}
    <p><a href="{{ route('districts.show', $vendor->district->id) }}">{{ $vendor->district->name }}</a></p>
</div>
@endif

<!-- Vendor Category Id Field -->
<div class="form-group">
    {!! Form::label('vendor_category_id', 'Vendor Category:') !!}
    <p><a href="{{ route('vendor-categories.show', $vendor->vendor_category->id) }}">{{ $vendor->vendor_category->name }}</a></p>
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

