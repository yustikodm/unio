<!-- Nama Field -->
@if(Request::is('promo/*/edit'))
    <!-- Tanggal Berakhir Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('barang_id', 'Barang:') !!}
        {!! Form::text('barang_id', $promo->barang_nama->nama ,['class' => 'form-control', 'disabled' => 'true']) !!}
    </div>
@else
    <!-- barang diled-->
    <div class="form-group col-sm-6">
        {!! Form::label('barang_id', 'Barang:') !!}
        {!! Form::select('barang_id', $barangItems, null,['class' => 'select2 form-control']) !!}
    </div>
@endif

{{-- @if(Request::is('promo/*/edit'))
    <!-- Tanggal Mulai Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
        {!! Form::date('tanggal_mulai', $promo->tanggal_mulai, ['class' => 'form-control','id'=>'tanggal_mulai']) !!}
    </div>
@else
    <!-- Tanggal Mulai Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_mulai', 'Tanggal Mulai:') !!}
        {!! Form::date('tanggal_mulai', null, ['class' => 'form-control','id'=>'tanggal_mulai']) !!}
    </div>
@endif--}}

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_mulai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

{{-- @if(Request::is('promo/*/edit'))
    <!-- Tanggal Berakhir Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_berakhir', 'Tanggal Berakhir:') !!}
        {!! Form::date('tanggal_berakhir', $promo->tanggal_berakhir, ['class' => 'form-control','id'=>'tanggal_berakhir']) !!}
    </div>
@else
    <!-- Tanggal Berakhir Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tanggal_berakhir', 'Tanggal Berakhir:') !!}
        {!! Form::date('tanggal_berakhir', null, ['class' => 'form-control','id'=>'tanggal_berakhir']) !!}
    </div>
@endif --}}

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_berakhir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush




