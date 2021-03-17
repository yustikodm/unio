
@if(Request::is('terimaBarang/*/edit'))
    <!-- Kirim Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kirim_barang_id', 'Kode Kirim Barang:') !!}
    {!! Form::text('kirim_barang_id', $terimaBarang->kodeKirim, ['class' => 'form-control', 'disabled' => 'true']) !!}
</div>
@else
<!-- Kirim Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kirim_barang_id', 'Kode Kirim Barang:') !!}
    {!! Form::select('kirim_barang_id', $kirim_barang, null, ['class' => 'select2 form-control', 'id' => 'tb_kb']) !!}
</div>
{!! Form::hidden('status', "Open", null) !!}
@endif

{!! Form::hidden('purchase_order_id', null, ['id' => 'tb_po']) !!}

<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control', "id" => 'tb_kode']) !!}
</div> -->

<!-- Pegawai Id Field -->
@if(Request::is('terimaBarang/*/edit'))
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
    {!! Form::label('supplier_id', 'Supplier:') !!}
    {!! Form::select('supplier_id', $supplierItems, null, ['class' => 'select2 form-control']) !!}
</div>

{{-- <!-- Tanggal Field -->
@if(Request::is('terimaBarang/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $terimaBarang->tanggal, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>
@endif --}}

@push('scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush


