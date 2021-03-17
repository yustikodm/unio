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

<!-- Tanggal Lahir Field -->
@if(Request::is('pegawai/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', $pegawai->tanggal_lahir, ['class' => 'form-control','id'=>'tanggal_lahir']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control','id'=>'tanggal_lahir']) !!}
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

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<!-- Telepon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telepon', 'Telepon:') !!}
    {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan_id', 'Jabatan:') !!}
    {!! Form::select('jabatan_id', $jabatanItems, null, ['class' => 'select2 form-control']) !!}
</div>
