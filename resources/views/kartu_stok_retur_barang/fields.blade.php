<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Retur Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('retur_barang_id', 'Retur Barang:') !!}
    {!! Form::select('retur_barang_id', $returBarangItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Stok Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stok_awal', 'Stok Awal:') !!}
    {!! Form::text('stok_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Retur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('retur', 'Retur:') !!}
    {!! Form::text('retur', null, ['class' => 'form-control']) !!}
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
    <a href="{{ route('kartuStokReturBarang.index') }}" class="btn btn-default">Cancel</a>
</div>
