<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Penyesuaian Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penyesuaian_id', 'Penyesuaian:') !!}
    {!! Form::select('penyesuaian_id', $penyesuaianStokItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Stok Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    {!! Form::text('stok_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masuk', 'Masuk:') !!}
    {!! Form::text('masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Keluar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keluar', 'Keluar:') !!}
    {!! Form::text('keluar', null, ['class' => 'form-control']) !!}
</div>

<!-- Stok Akhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok_akhir', 'Stok Akhir:') !!}
    {!! Form::text('stok_akhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kartuStokPenyesuaian.index') }}" class="btn btn-default">Cancel</a>
</div>
