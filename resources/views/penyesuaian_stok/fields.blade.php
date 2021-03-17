<div class="overlay" style="display: none; position: fixed; width: 67%; top: 300px;">
    <i class="fa fa-refresh fa-spin"></i>
</div>
<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Barang Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div> -->

<!-- Tanggal Field -->
<!-- @if(Request::is('penyesuaianStok/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $penyesuaianStok->tanggal, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', date("Y-m-d"), ['class' => 'form-control','id'=>'tanggal']) !!}
</div>
@endif -->

<!-- Stok Database Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('stok_database', 'Stok Database:') !!}
    {!! Form::text('stok_database', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div> -->

<!-- Stok Lapangan Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('stok_lapangan', 'Stok Lapangan:') !!}
    {!! Form::text('stok_lapangan', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Jumlah Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::text('jumlah', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div> -->

<!-- Tipe Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('tipe', 'Tipe:') !!}
    {!! Form::text('tipe', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div> -->

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
    {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'createField']) !!}
    <a href="{{ route('penyesuaianStok.index') }}" class="btn btn-default">Cancel</a>
</div>
