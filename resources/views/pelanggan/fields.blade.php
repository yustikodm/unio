<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Nomor Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_ktp', 'Nomor KTP:') !!}
    {!! Form::text('nomor_ktp', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <div class="form-group">
        <label class="radio-inline">
        {!! Form::radio('jenis_kelamin', "Laki-laki", null) !!} Laki-laki
    </label>

    <label class="radio-inline">
        {!! Form::radio('jenis_kelamin', "Perempuan", null) !!} Perempuan
    </label>
    </div>
</div>

<div class="row"></div>

<!-- Tanggal Lahir Field -->
@if(Request::is('pelanggan/*/edit'))
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        {!! Form::date('tanggal_lahir', $pelanggan->tanggal_lahir, ['class' => 'form-control', 'id'=>'tanggal_lahir']) !!}
    </div>
@else
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control', 'id'=>'tanggal_lahir']) !!}
    </div>
@endif

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_lahir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Pekerjaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pekerjaan', 'Pekerjaan:') !!}
    {!! Form::select('pekerjaan_id', $pekerjaanItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kota', 'Kota:') !!}
    {!! Form::select('kota_id', $kotaItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
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

<!-- Tanggal Daftar Field -->
@if(Request::is('pelanggan/*/edit'))
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_daftar', 'Tanggal Daftar:') !!}
        {!! Form::date('tanggal_daftar', $pelanggan->tanggal_daftar, ['class' => 'form-control','id'=>'tanggal_daftar', 'readonly' => 'true']) !!}
    </div>
@else
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_daftar', 'Tanggal Daftar:') !!}
        {!! Form::date('tanggal_daftar', date("Y-m-d"), ['class' => 'form-control','id'=>'tanggal_daftar', 'readonly' => 'true']) !!}
    </div>
@endif

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_daftar').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pelanggan.index') }}" class="btn btn-default">Cancel</a>
</div>
