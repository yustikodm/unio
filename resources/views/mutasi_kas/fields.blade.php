<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe', 'Tipe:') !!}
    {!! Form::select('tipe', ['Masuk' => 'Masuk', 'Keluar' => 'Keluar'], null, ['class' => 'form-control select2']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <div class="input-group">
        <span class="input-group-addon">Rp</span>
        @if(Request::is('mutasiKas/*/edit'))
            {!! Form::text('Inpjumlah', $mutasiKas->jumlah, ['class' => 'form-control']) !!}
            {!! Form::hidden('jumlah', $mutasiKas->jumlah) !!}
        @else
            {!! Form::text('Inpjumlah', null, ['class' => 'form-control']) !!}
            {!! Form::hidden('jumlah') !!}
        @endif 
    </div>
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mutasiKas.index') }}" class="btn btn-default">Cancel</a>
</div>

<script>
    $("[name='Inpjumlah']").keyup(function(){
        $(this).val(formatRupiah(this.value));

       var split = this.value.replace(/[^,\d]/g, "").toString();
       $("#jumlah").val(split)
    })
</script>
