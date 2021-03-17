<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Pic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pic', 'Pic:') !!}
    {!! Form::text('pic', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Kelurahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelurahan', 'Kelurahan:') !!}
    {!! Form::text('kelurahan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kecamatan', 'Kecamatan:') !!}
    {!! Form::text('kecamatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kota', 'Kota:') !!}
    {!! Form::text('kota', null, ['class' => 'form-control']) !!}
</div>

<!-- Kodepos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kodepos', 'Kodepos:') !!}
    {!! Form::text('kodepos', null, ['class' => 'form-control']) !!}
</div>

<!-- Telepon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telepon', 'Telepon:') !!}
    {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
</div>

<!-- Hp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hp', 'Hp:') !!}
    {!! Form::text('hp', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kategori', 'Kategori:') !!}
    <label class="radio-inline">
        {!! Form::radio('kategori', "Internal", null) !!} Internal
    </label>

    <label class="radio-inline">
        {!! Form::radio('kategori', "Eksternal", null) !!} Eksternal
    </label>

</div>

<!-- Npwp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('npwp', 'Npwp:') !!}
    {!! Form::text('npwp', null, ['class' => 'form-control']) !!}
</div>

<!-- Rekening Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rekening', 'Rekening:') !!}
    {!! Form::text('rekening', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('supplier.index') }}" class="btn btn-default">Cancel</a>
</div>
