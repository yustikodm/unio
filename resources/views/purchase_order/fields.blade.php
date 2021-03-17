<div class="overlay" style="display: none; position: fixed; width: 67%; top: 300px;">
    <i class="fa fa-refresh fa-spin"></i>
</div>
<!-- Kode Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control', 'id' => 'po_kode']) !!}
</div> -->

{{-- <!-- Tanggal Field -->
@if(Request::is('purchaseOrder/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $purchaseOrder->tanggal, ['class' => 'form-control','id'=>'tanggal']) !!}
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

@if(Request::is('purchaseOrder/*/edit'))
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

{{-- <!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "Open", null) !!} Open
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "Close", null) !!} Close
    </label>
</div> --}}

{!! Form::hidden('status', "Open", null) !!}
