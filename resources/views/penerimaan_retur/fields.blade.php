<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div> -->


@if(Request::is('penerimaanRetur/*/edit'))
    <div class="form-group col-sm-6">
        {!! Form::label('retur_barang_id', 'Retur Barang:') !!}
        {!! Form::text('retur_barang_id', $penerimaanRetur->kode_retur, ['class' => 'form-control', 'disabled' => 'true']) !!}
    </div>
@else
    <!-- Retur Barang Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('retur_barang_id', 'Retur Barang:') !!}
        {!! Form::select('retur_barang_id', $retur_barangItems, null, ['class' => 'select2 form-control']) !!}
    </div>
@endif

<!-- Pegawai Id Field -->
@if(Request::is('penerimaanRetur/*/edit'))
    @if(!empty($PegawaiUser))
        <div class="form-group col-sm-6">
            {!! Form::label('pegawai', 'Admin:') !!}
            {!! Form::select('pegawai', $pegawaiItems, $PegawaiUser->id, ['class' => 'select2 form-control', 'disabled' => 'true']) !!}
            {!! Form::hidden('pegawai_id', $PegawaiUser->id) !!}
        </div>
    @else
        <div class="form-group col-sm-6">
            {!! Form::label('pegawai_id', 'Admin:') !!}
            {!! Form::select('pegawai_id', $pegawaiItems, null, ['class' => 'select2 form-control', 'placeholder' => '-']) !!}
        </div>
    @endif
@else
    @if(!empty($PegawaiUser))
        <div class="form-group col-sm-6">
            {!! Form::label('pegawai', 'Admin:') !!}
            {!! Form::select('pegawai', $pegawaiItems, $PegawaiUser->id, ['class' => 'select2 form-control', 'disabled' => 'true']) !!}
            {!! Form::hidden('pegawai_id', $PegawaiUser->id) !!}
        </div>
    @else
        <div class="form-group col-sm-6">
            {!! Form::label('pegawai_id', 'Admin:') !!}
            {!! Form::select('pegawai_id', $pegawaiItems, null, ['class' => 'select2 form-control', 'placeholder' => '-']) !!}
        </div>
    @endif
@endif

<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Nama Supplier:') !!}
    {!! Form::select('supplier_id', $supplierItems, null, ['class' => 'select2 form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<!-- Tanggal Field -->
<!-- <div class="form-group col-sm-6">
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
@endpush -->

<!-- Status Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
