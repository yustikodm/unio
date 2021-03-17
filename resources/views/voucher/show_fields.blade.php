<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $voucher->kode }}</p>
</div>

<!-- Kadaluarsa Field -->
<div class="form-group">
    {!! Form::label('kadaluarsa', 'Kadaluarsa:') !!}
    <p>{{ $voucher->kadaluarsa }}</p>
</div>

<!-- Diskon Field -->
<div class="form-group">
    {!! Form::label('diskon', 'Diskon:') !!}
    <p>{{ $voucher->diskon }}</p>
</div>

<!-- Diskon Field -->
<div class="form-group">
    {!! Form::label('diskon', 'Diskon:') !!}
    <p>{{ $voucher->tipe }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $voucher->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $voucher->updated_at }}</p>
</div>

