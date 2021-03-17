@if(Request::is('kirimBarang/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('purchase_order_id', 'Purchase Order:') !!}
    {!! Form::select('purchase_order_id',$purchase_order, $kirimBarang->purchase_order_id, ['class' => 'select2 form-control', 'id' => 'kb_po', 'disabled' => true]) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('purchase_order_id', 'Purchase Order:') !!}
    {!! Form::select('purchase_order_id',$purchase_order, null, ['class' => 'select2 form-control', 'id' => 'kb_po']) !!}
</div>
{!! Form::hidden('status', "Open", null) !!}
@endif

<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control', 'id' => 'kb_kode']) !!}
</div> -->

@if(Request::is('kirimBarang/*/edit'))
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
@if(Request::is('kirimBarang/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $kirimBarang->tanggal, ['class' => 'form-control','id'=>'tanggal']) !!}
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
