<!-- Barang Id Field -->
@if(Request::is('harga/*/edit'))
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, $harga->barang_id, ['class' => 'select2 form-control', 'disabled' => 'true']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang:') !!}
    {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
</div>
@endif

<!-- Barang Id Field -->
@if(Request::is('harga/*/edit'))
<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    <div class="input-group">
        <span class="input-group-addon">Rp</span>
        {!! Form::text('barang_harga', $harga->harga, ['class' => 'form-control', 'id' => 'barang_harga']) !!}    
        {!! Form::hidden('harga') !!}    
    </div>
</div>

@else
<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    <div class="input-group">
        <span class="input-group-addon">Rp</span>
        {!! Form::text('barang_harga', null, ['class' => 'form-control', 'id' => 'barang_harga']) !!}    
        {!! Form::hidden('harga') !!}    
    </div>
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('harga.index') }}" class="btn btn-default">Cancel</a>
</div>
<script>
    $("#barang_harga").keyup(function(){
        $(this).val(formatRupiah(this.value));

       var split = this.value.replace(/[^,\d]/g, "").toString();
       $("#harga").val(split)
    })
</script>
