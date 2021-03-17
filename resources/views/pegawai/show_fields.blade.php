<!-- Kode Field -->
<div class="form-group">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $pegawai->kode }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $pegawai->nama }}</p>
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    <p>{{ $pegawai->tanggal_lahir }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $pegawai->alamat }}</p>
</div>

<!-- Telepon Field -->
<div class="form-group">
    {!! Form::label('telepon', 'Telepon:') !!}
    <p>{{ $pegawai->telepon }}</p>
</div>

<!-- Jabatan Id Field -->
<div class="form-group">
    {!! Form::label('jabatan_id', 'Jabatan:') !!}
    <p>{{ $pegawai->jabatan }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pegawai->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pegawai->updated_at }}</p>
</div>

