@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Tagihan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Kode Field -->
                        <div class="form-group">
                            {!! Form::label('kode', 'Kode:') !!}
                            <p>{{ $penjualan->kode }}</p>
                        </div>

                        <!-- Pelanggan Id Field -->
                        <div class="form-group">
                            {!! Form::label('pelanggan_id', 'Nama Pelanggan:') !!}
                            <p>{{ $penjualan->nama_pelanggan }}</p>
                        </div>
                        <!-- Ppn Field -->
                        <div class="form-group">
                            {!! Form::label('ppn', 'Ppn:') !!}
                            <p>{{ $penjualan->ppn }}%</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Diskon Field -->
                        <div class="form-group">
                            {!! Form::label('diskon', 'Voucher Diskon:') !!}
                            <p>{{ $penjualan->kode_voucher }}</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('diskon', 'Diskon Voucher:') !!}
                            <p>{{ $penjualan->diskon_voucher }}%</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('diskon', 'Diskon Mitra:') !!}
                            <p>{{ $penjualan->diskon_mitra }}%</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                       <!-- Ppn Field -->
                       <div class="form-group">
                            {!! Form::label('ongkir', 'Ongkir:') !!}
                            <p>Rp. {{ number_format($penjualan->ongkir) }}</p>
                        </div>

                        <!-- Total Field -->
                        <div class="form-group">
                            {!! Form::label('total', 'Total:') !!}
                            <p>Rp. {{ number_format($penjualan->total) }}</p>
                        </div>

                        <!-- Created At Field -->
                        <div class="form-group">
                            {!! Form::label('created_at', 'Tanggal:') !!}
                            <p>{{ $penjualan->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <h4>Barang</h4>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    @if(count($barangPenjualanReguler) != 0)

                        @if(count($barangPenjualanPaket) != 0)
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                        @else
                            <div class="col-lg-12 col-md-12 col-sm-12" >
                        @endif

                            @include('penjualan.show_blistr')
                        </div>
                    @endif
                    @if(count($barangPenjualanPaket) != 0)

                        @if(count($barangPenjualanReguler) != 0)
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                        @else
                            <div class="col-lg-12 col-md-12 col-sm-12" >
                        @endif

                            @include('penjualan.show_blistp')
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <div class="col-sm-12">
                    <h4>Metode Pembayaran</h4>
                </div>
            </div>

            {!! Form::open(['route' => ['updatePenjualan', $penjualan->id], 'method' => 'post', 'id' => 'formPembayaran']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Metode Pembayaran Field -->
                                <div class="form-group">
                                    {!! Form::label('metode_pembayaran_id', 'Metode Pembayaran:') !!}
                                    {!! Form::select('metode_pembayaran_id', $metodePembayaranItems, null, ['class' => 'select2 form-control']) !!}
                                </div>

                                <!-- Bank Field -->
                                <div class="form-group" style="margin-top: 41px;">
                                    {!! Form::label('bank_id', 'Bank:') !!}
                                    {!! Form::select('bank_id', $bankItems, null, ['class' => 'select2 form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Nama Rekening Field -->
                                <div class="form-group" >
                                    {!! Form::label('nama_rekening', 'Nama Rekening:') !!}
                                    {!! Form::text('nama_rekening', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Nomor Rekening Field -->
                                <div class="form-group" style="margin-top: 41px;">
                                    {!! Form::label('nomor_rekening', 'Nomor Rekening:') !!}
                                    {!! Form::text('nomor_rekening', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <div class="col-sm-12">
                    <h4>Pembayaran</h4>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            @if(!empty($penjualan->mitra_id))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('', 'Bonus Anda: ') !!}
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <div class="material-switch" style="display: inline-block;">
                                            <input id="useBonus" name="with_bonus" type="checkbox" value="1"/>
                                            <label for="useBonus" class="label-primary"></label>
                                        </div>
                                        <h3>Rp. {{ number_format($bonus) }}</h3>
                                    </div>

                                    <div class="form-group" style="margin-top: 28px;">
                                        <div class="form-group">
                                            {!! Form::label('inpBonus', 'Masukan nominal yang ingin digunakan: ') !!}
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp. </span>
                                                {!! Form::text('inpBonus', null, ['class' => 'form-control', 'readonly' => "true"]) !!}
                                                {!! Form::hidden('bonus', null,['id' => 'bonus']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('total', 'Total:') !!}
                                    <h1 class="text-right grandTotal">Rp. {{ number_format($penjualan->total) }}</h1>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('bayar', 'Bayar:') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp. </span>
                                        {!! Form::text('Inpbayar', number_format($penjualan->total,0,"","."), ['class' => 'form-control']) !!}
                                        {!! Form::hidden('bayar', $penjualan->total) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding: 20px">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a class="btn btn-default" href="{{ route('pembayaran') }}">Back</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="btn-group" style="width: 100%;">
                                {!! Form::submit('Bayar', ['class' => 'btn btn-success col-sm-6', 'id' => 'btnAddPenjualan']) !!}
                                {!! Form::close() !!}
                                <button class="btn btn-danger col-sm-6 btnBatal" data-id="{{ $penjualan->id }}">Batalkan Transaksi</button>
                                <!-- <a onclick="return confirm('Yakin Membatalkan Transaksi!')" href="batalTransaksi\{{ $penjualan->id }}" class="btn btn-danger col-sm-6">Batalkan Transaksi</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($penjualan->mitra_id))
        <script>
            var bonus_mitra = "{{ $bonus }}"
        </script>
    @else
        <script>
            var bonus_mitra = 0
        </script>
    @endif
    <script>
        $(document).ready(function(){
            $(function(){
                var grand_total = "{{ $penjualan->total }}"
                $("[name='Inpbayar']").keyup(function(){
                    $(this).val(formatRupiah(this.value))
                    if(parseInt($(this).val().replace(/[^,\d]/g, "")) >= grand_total){
                        $(this).css('border' ,'1px solid #ccc')
                    }else{
                        $(this).css('border' ,'1px solid red')
                    }
                    $("[name='bayar']").val($(this).val().replace(/[^,\d]/g, ""))
                })

                $("#useBonus").click(function(){
                    if($(this).prop('checked') == true){
                        console.log("dengan bonus")
                        $("#inpBonus").attr('readonly', false);
                    }else if($(this).prop('checked') == false){
                        console.log("tidak dengan bonus")
                        $("#inpBonus").attr('readonly', true);
                        $("#inpBonus").val('');
                        $("#bonus").val('')
                        $("[name='Inpbayar']").val(formatRupiah(grand_total));
                        $("[name='bayar']").val(grand_total);
                        $(".grandTotal").html(formatRupiah(grand_total, "Rp. "))
                    }
                })

                $("#inpBonus").keyup(function(){
                    var thisValue = parseInt($(this).val().replace(/[^,\d]/g, ""))
                    var bonusMitra = parseInt(bonus_mitra)
                    var grandTotal = grand_total
                    // console.log(thisValue)
                    // console.log(bonusMitra)

                    if( thisValue >= bonusMitra ){
                        this.value = formatRupiah(bonus_mitra)
                        $("#bonus").val(bonus_mitra)
                        $("[name='Inpbayar']").val(formatRupiah(grandTotal - bonus_mitra));
                        $("[name='bayar']").val(grandTotal - bonus_mitra);
                        $(".grandTotal").html(formatRupiah(grandTotal - bonus_mitra, "Rp. "))
                    }else if( thisValue <= bonusMitra ){
                        this.value = formatRupiah(this.value)
                        $("#bonus").val(thisValue)
                        $("[name='Inpbayar']").val(formatRupiah(grandTotal - thisValue));
                        $("[name='bayar']").val(grandTotal - thisValue);
                        $(".grandTotal").html(formatRupiah(grandTotal - thisValue, "Rp. "))
                    }else if( $(this).val() == '' ){
                        $(this).val('')
                        $("#bonus").val('')
                        $("#Inpbayar").val(formatRupiah(grand_total));
                        $("#bayar").val(grand_total);
                        $(".grandTotal").html(formatRupiah(grand_total, "Rp. "))
                    }
                });

                $('#btnAddPenjualan').on('click',function(e){
                    e.preventDefault();
                    var form = $("#formPembayaran");
                    if(
                        $("#metode_pembayaran_id").val() == '' ||
                        $("#bank_id").val() == '' ||
                        $("#nama_rekening").val() == '' ||
                        $("#bayar").val() == ''
                    ){
                        swal("Gagal!","Data ada yang kosong!", "warning")
                    }else{
                        swal({
                            title: "Apakah Anda Yakin?",
                            text: "Yakin melakukan pembayaran transaksi ini!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#39b55a",
                            confirmButtonText: "Ya",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true
                        }, function(isConfirm){
                            if (isConfirm) form.submit();
                        });
                    }
                });

                $(".btnBatal").click(function(e){
                    var id = $(this).attr('data-id')
                    swal({
                        title: "Apakah Anda Yakin?",
                        text: "Berikan keterangan kenapa transaksi dibatalkan!",
                        type: "input",
                        showCancelButton: true,
                        confirmButtonText: "Batalkan!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                        confirmButtonColor: "#dd4b39",
                        inputPlaceholder: "Tulis Sesuatu"
                    }, function(input){
                        if (input === false) return false;
                        if (input === "") {
                            swal.showInputError("Anda harus mengisi keterangan!");
                            return false
                        }
                        var data = {
                            keterangan : input
                        }
                        window.location.href = baseUrl+'batalTransaksi?id='+ id + '&k=' + input                         
                    })
                })
            })
        })
    </script>
@endsection
