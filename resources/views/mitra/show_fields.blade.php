<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $mitra->kode }}</p>
</div>

<!-- Pelanggan Id Field -->
<div class="form-group">
    {!! Form::label('pelanggan_id', 'Pelanggan Nama:') !!}
    <p>{{ $mitra->nama }}</p>
</div>

<div class="form-group">
    {!! Form::label('pelanggan_id', 'Pelanggan Kode:') !!}
    <p>{{ $mitra->pelanggan_kode }}</p>
</div>

<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Level :') !!}
    <p>{{ $mitra->level }}</p>
</div>

<!-- Tanggal Mulai Field -->
<div class="form-group">
    {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
    <p>{{ $mitra->tanggal_mulai }}</p>
</div>

<!-- Tanggal Akhir Field -->
<div class="form-group">
    {!! Form::label('tanggal_akhir', 'Tanggal Akhir:') !!}
    <p>{{ $mitra->tanggal_akhir }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $mitra->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $mitra->updated_at }}</p>
</div>

