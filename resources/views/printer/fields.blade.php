<!-- Nama Field -->
<div class="row">
    <div class="col-md-12">
        <p>
            <i>
                <span style="color: red;">*</span>
                <small>Pastikan Printer sudah terinstall driver dan sudah di mode sharing</small>
                <span style="color: red;">*</span>
            </i>
        </p>
        <p>
            <i>
                <span style="color: red;">*</span>
                <small>Jika ingin mencoba test print pastikan printer aktif / siap digunakan</small>
                <span style="color: red;">*</span>
            </i>
        </p>
    </div>
</div>

<!-- Nama Field -->
<div class="row">
    <!-- Diskon Voucher Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nama', 'Nama:') !!}
        <div class="input-group">
            {!! Form::text('nama', null, ['class' => 'form-control']) !!}            
            <span class="input-group-addon btn btn-default" id="testPrinter">Test Printer</span>
        </div>
    </div>
</div>

<div class="row">
    @if(Request::is('printer/*/edit'))
        <div class="form-group col-sm-6">
            {!! Form::hidden('default', $printer->default) !!}
            {!! Form::label('default', 'Default', ['class' => 'control-label text-right']) !!}
            {!! Form::checkbox('default', 1, null) !!}
        </div>
    @else
        <div class="form-group col-sm-6">
            {!! Form::hidden('default', 0) !!}
            {!! Form::label('default', 'Default', ['class' => 'control-label text-right']) !!}
            {!! Form::checkbox('default', 1, null) !!}
        </div>
    @endif
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('printer.index') }}" class="btn btn-default">Cancel</a>
</div>

<script>
    $(document).ready(function(){
        $(function(){
            var url = "{{url('/')}}"
            $("#testPrinter").click(function(){
                var namaPrinter = $("#nama").val();
                if(namaPrinter == ''){
                    swal("Perhatian", "Nama printer kosong, Mohon isi terlebih dahulu", "info")
                }else{
                    swal("loading")
                    var data = {
                        nama_printer : namaPrinter
                    }
                    $.post(url+'/cobaPrinter', data, function(res){
                        res = JSON.parse(res)
                        if(res.success){
                            swal("Tunggu", "Jika dalam beberapa saat kedepan, printer tidak jalan berarti ada masalah di ketersedian printer")
                        }else{
                            swal("Perhatian", res.msg, 'warning')
                        }
                    }).fail(function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText).errors
                        $('.overlay').hide()
                        if(err === undefined){
                            swal({
                                type: "warning",
                                title: "Warning",
                                text: JSON.parse(xhr.responseText).message,
                                showConfirmButton: true,
                            });    
                        }else{
                            for (const property in err) {
                                swal({
                                    type: "warning",
                                    title: "Warning",
                                    text: `${property}: ${err[property]}`,
                                    showConfirmButton: true,
                                });
                            }     
                        }                        
                    });
                }
            })
        })
    })
</script>