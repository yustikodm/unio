@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transaksi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        {!! Form::open(['route' => 'penjualan.store']) !!}

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                        <!-- Kode Field -->
                        <!-- <div class="form-group col-sm-6">
                            {{-- {!! Form::label('kode', 'Kode:') !!} --}}
                            {{-- {!! Form::text('kode', null, ['class' => 'form-control']) !!} --}}
                        </div> -->

                        <!-- Pegawai Id Field -->
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

                        <!-- Pelanggan Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('pelanggan_id', 'Pelanggan:') !!}
                            {!! Form::select('pelanggan_id', $pelangganItems, null, ['class' => 'select2 form-control', 'placeholder' => '-']) !!}
                        </div>

                        <!-- Mitra Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('mitra_id', 'Mitra:') !!}
                            {!! Form::select('mitra_id', $mitraItems, null, ['class' => 'select2 form-control', 'placeholder' => '-']) !!}
                        </div>

                        <!-- Mitra Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('level_mitra', 'Level Mitra:') !!}
                            {!! Form::text('level_mitra', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
                        </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <div class="col-sm-12">
                    <h4>Produk</h4>
                </div>
            </div>
            <div class="box-header with-border">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        {!! Form::select('barang_id', $barangItems, null, ['class' => 'select2 form-control']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::number('jumlah_barang', null, ['class' => 'form-control', 'placeholder' => 'Jumlah']) !!}
                    </div>
                    <div class="col-sm-4">
                        <button id="add_barang_button" class="btn btn-success" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="overlay" style="display: none; position: fixed; width: 67%; top: 300px;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Harga (setelah diskon)</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <thead>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Subtotal</th>
                                <th>Rp. <span class="subtotal"></span></th>
                                <th></th>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <div class="col-sm-12">
                    <h4>Diskon</h4>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <!-- Voucher Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('voucher_id', 'Voucher:') !!}
                                <select name="voucher_id" id="voucher_id" class="select2 form-control" placeholder="-">

                                </select>
                            </div>

                            <!-- Diskon Voucher Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('diskon_voucher', 'Diskon Voucher:') !!}
                                <div class="input-group diskonInput">
                                    {!! Form::text('', 0, ['class' => 'form-control', 'readonly' => 'true', 'id' => 'diskonVoucher']) !!}
                                    {!! Form::hidden('diskon_voucher') !!}
                                </div>
                            </div>

                            <!-- Diskon Mitra Field -->
                            <div class="form-group col-sm-4">
                                {!! Form::label('diskon_mitra', 'Diskon Mitra:') !!}
                                <div class="input-group">
                                    {!! Form::number('diskon_mitra', 0, ['class' => 'form-control', 'readonly' => 'true']) !!}
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <div class="row">
                    <!-- Ppn Field -->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('ppn', 'Ppn:') !!}
                            <div class="input-group">
                                {!! Form::number('ppn', 0, ['class' => 'form-control']) !!}
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 35px;">
                            {!! Form::label('ongkir', 'Ongkos Kirim:') !!}
                            <div class="input-group">
                                <span class="input-group-addon">Rp. </span>
                                {!! Form::text('', 0, ['class' => 'form-control', 'id' => 'Inpongkir', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57']) !!}
                                {!! Form::hidden('ongkir', 0, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-6 col-lg-4">
                        <div class="form-group">
                            <button class="btn btn-success btn-block" id="btnHitung" type="button" style="margin-top: 25px;">
                                Hitung Total Pembayaran
                            </button>
                        </div>
                        <div class="form-group">
                            {!! Form::label('total', 'Total') !!}
                            <h1 class="text-right">Rp. <span class="grand_total"></span></h1>
                            {!! Form::hidden('total', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-md-6 col-lg-4" style="padding-top: 24px;">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnAddPenjualan']) !!}
                        <a href="{{ route('penjualan.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::hidden('grand_total') !!}
        {!! Form::close() !!}
    </div>

<script>
    $(document).ready(function () {
        $(function () {
            function checkStock() {
                console.log('z: ' + statusStok);
                // return 0;
            };

            var subtotal = 0;
            var grand_total = 0;
            var kode = 1;
            var pegawai_id = $("[name='pegawai_id']").val();

            if(pegawai_id != '' || pegawai_id != null)
            {
                $('#voucher_id').html('')
                $('#diskonVoucher').val('')
                $(".diskonInput .input-group-addon").remove()
                $('#voucher_id').val('')
                $("#diskon_voucher").val('')
               if(pegawai_id != ''){
                    $.get(apiUrl+'pegawai/'+pegawai_id, function(pegawai){
                        // console.log(pegawai)
                        if(pegawai.data.jabatan_id != 0){
                            // console.log(pegawai.data)
                            $.get(apiUrl+'getVoucherByJabatanId/'+pegawai.data.jabatan_id, function(voucher){
                                console.log(voucher)
                                $('#voucher_id').append(`
                                        <option value=""> - </option>
                                    `)
                                voucher.data.forEach((row) => {
                                    $('#voucher_id').append(`
                                        <option value="`+ row.id +`">`+ row.kode +`</option>
                                    `)
                                })
                                // var data_voucher = voucher.data.filter( (data) => {
                                //     return data.jabatan_id == pegawai.data.jabatan_id;
                                // })
                                // console.log(data_voucher)
                            })
                        }
                        // else{
                        //     console.log("Tidak Punya User")
                        // }
                    })
               }
            }

            $("#pegawai_id").change(function(){
                // console.log($(this).val());
                $('#voucher_id').html('')
                $('#diskonVoucher').val('')
                $(".diskonInput .input-group-addon").remove()
                $('#voucher_id').val('')
                $("#diskon_voucher").val('')
               if($(this).val() != ''){
                    $.get(apiUrl+'pegawai/'+$(this).val(), function(pegawai){
                        // console.log(pegawai)
                        if(pegawai.data.jabatan_id != 0){
                            // console.log(pegawai.data)
                            $.get(apiUrl+'getVoucherByJabatanId/'+pegawai.data.jabatan_id, function(voucher){
                                console.log(voucher)
                                $('#voucher_id').append(`
                                        <option value=""> - </option>
                                    `)
                                voucher.data.forEach((row) => {
                                    $('#voucher_id').append(`
                                        <option value="`+ row.id +`">`+ row.kode +`</option>
                                    `)
                                })
                                // var data_voucher = voucher.data.filter( (data) => {
                                //     return data.jabatan_id == pegawai.data.jabatan_id;
                                // })
                                // console.log(data_voucher)
                            })
                        }
                        // else{
                        //     console.log("Tidak Punya User")
                        // }
                    })
               }
            })

            function addBarang(barang_id, jumlah = null, idPaket = null) {
                if(jumlah == null){
                    $.ajax({
                        type: 'GET',
                        url: "{!! url('api/stokHarga') !!}/" + barang_id,
                        success: function (result) {
                            if ($.isEmptyObject(result.data)) {
                                console.log('empty');
                            } else {
                                var response = result.data[0];
                                var harga = response.harga;
                                var diskon_produk = response.diskon;
                                if(response.tipe_diskon == 'persen'){
                                    var harga_setelah_diskon = harga - (diskon_produk / 100 * harga);
                                    diskon_produk = diskon_produk + "%"
                                }else if(response.tipe_diskon == 'rupiah'){
                                    var harga_setelah_diskon = harga - diskon_produk;
                                    diskon_produk = "Rp. " + formatRupiah(diskon_produk)
                                }else{
                                    var harga_setelah_diskon = harga - diskon_produk;
                                }
                                var jumlah = isNaN(parseInt($("[name='jumlah_barang']").val())) ? 0 : parseInt($("[name='jumlah_barang']").val());

                                if(harga == 0 && diskon_produk == 0){
                                    var switchDiskon = ` `;
                                }else{
                                    var switchDiskon = `<div class="material-switch pull-right">
                                        <input class="disableDiskon" id="disableDiskon-` + response.id + `" type="checkbox" checked="true"/>
                                        <label for="disableDiskon-` + response.id + `" class="label-primary"></label>
                                    </div>`;
                                }

                                if ($(`[data-reguler='`+ response.id +`']`).length == 0) {
                                    $('tbody').append(`
                                        <tr data-reguler='` + response.id + `' class='id_barang_` + response.id + `'>
                                            <td>` + response.nama +`</td>
                                            <td>Rp. ` + formatRupiah(harga) + `</td>
                                            <td class='diskon-perbarang' tipe='`+ response.tipe_diskon +`' diskon="`+ response.diskon +`">
                                                <span class="textDiskon">`+ diskon_produk +`</span>
                                                `+ switchDiskon +`
                                            </td>
                                            <td>Rp. ` + formatRupiah(harga_setelah_diskon) + `</td>
                                            <td class='jumlah'>` + jumlah + `</td>
                                            <td>Rp. <span>` + formatRupiah(harga_setelah_diskon * jumlah) + `</span></td>
                                            <td>
                                                <button class='barang_delete btn btn-danger btn-xs' type='button'>
                                                    <i class='fa fa-times' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                            <input name='barang_penjualan[]' type='hidden' value='` + response.id + `'>
                                            <input name='jumlah_barang_penjualan[]' type='hidden' value='` + jumlah + `'>
                                            <input name='diskon[]' type='hidden' value='true'>
                                        </tr>
                                    `);

                                    subtotal += harga_setelah_diskon * jumlah;
                                    $('.subtotal').html(formatRupiah(subtotal));
                                    kode++;

                                    // var ppn = $("[name='ppn']").val();
                                    // var diskon = $("[name='diskon']").val();

                                    // var setelah_diskon = subtotal - (diskon / 100 * subtotal)
                                    // var setelah_ppn = (ppn / 100 * setelah_diskon) + setelah_diskon;
                                    // grand_total = setelah_ppn;
                                    // $(".grand_total").html(setelah_ppn);
                                    // $("[name='total']").val(setelah_ppn);
                                } else {
                                    var jumlah_barang = parseInt($(`[data-reguler='`+ response.id +`']`).children().eq(4).html());
                                    var hasil = jumlah_barang + jumlah;
                                    var subtotal_barang = harga_setelah_diskon * hasil;

                                    $(`[data-reguler='`+ response.id +`']`).children().eq(4).html(hasil);
                                    $(`[data-reguler='`+ response.id +`']`).children().eq(5).html('Rp. <span>' + formatRupiah(subtotal_barang) + '</span>');
                                    $(`[data-reguler='`+ response.id +`']`).children().eq(8).val(hasil);

                                    subtotal += jumlah * harga_setelah_diskon;
                                    $('.subtotal').html(formatRupiah(subtotal));

                                    // var ppn = $("[name='ppn']").val();
                                    // var diskon = $("[name='diskon']").val();

                                    // var setelah_diskon = subtotal - (diskon / 100 * subtotal)
                                    // var setelah_ppn = (ppn / 100 * setelah_diskon) + setelah_diskon;
                                    // grand_total = setelah_ppn;

                                    // $(".grand_total").html(setelah_ppn);
                                    // $("[name='total']").val(setelah_ppn);
                                }
                            }
                        },
                        error: function (err) {

                        }
                    });
                }else{
                    $.ajax({
                        type: 'GET',
                        url: "{!! url("api/stokHarga") !!}/" + barang_id,
                        success: function (result) {
                            if ($.isEmptyObject(result.data)) {
                                console.log('empty');
                            } else {
                                var response = result.data[0];
                                // var harga = response.harga;
                                // var diskon_produk = response.diskon;
                                // var harga_setelah_diskon = harga - (diskon_produk / 100 * harga);
                                if ($('[data-paket="'+ response.id +'"][id-paket="'+ idPaket +'"]').length == 0) {
                                    $('tbody').append(
                                        "<tr data-paket='"+ response.id +"' id-paket='"+ idPaket +"' class='id_barang_" + response.id +idPaket + "'>" +
                                            "<td> - " + response.nama +" <span class='jumlah'>" + jumlah + "</span>x </td>" +
                                            "<td></td>" +
                                            "<td></td>" +
                                            "<td class='diskon-perbarang'></td>" +
                                            "<td></td>" +
                                            "<td><span>  </span></td>" +
                                            "<td>" +
                                            "</td>" +
                                            // "<input name='barang_penjualan[]' type='hidden' value='" + response.id + "'>" +
                                            // "<input name='jumlah_barang_penjualan[]' type='hidden' value='" + jumlah + "'>" +

                                        "</tr>"
                                    );
                                    kode++;
                                    $(".overlay").hide();
                                }else{
                                    var jumlah_barang = parseInt($(`[data-paket='`+ response.id +`'][id-paket='`+ idPaket +`']`).children().eq(0).children().html());
                                    var hasil = jumlah_barang + jumlah;
                                    $(`[data-paket='`+ response.id +`'][id-paket='`+ idPaket +`']`).children().eq(0).children().html(hasil);
                                    $(".overlay").hide();
                                }
                            }

                        },
                        error: function (err) {

                        }
                    });
                }
            }

            $("#pelanggan_id").change(function(){
                if(this.value != ''){
                    $("#mitra_id").attr("disabled", true)
                }else{
                    $("#mitra_id").attr("disabled", false)
                }
                // console.log("oke")
            })

            $("#mitra_id").change(function(){
                var mitra_id = $(this).val()
                if(mitra_id != ''){
                    $("#pelanggan_id").attr('disabled', true)
                    $.get(apiUrl+'mitra/'+mitra_id, function(mitra){
                        $.get(apiUrl+'level_mitra/'+mitra.data.level_mitra_id, function(level){
                            var parameter = "diskon_"+level.data.kode
                            $.get(apiUrl+'getDiskonMitra/'+parameter, function(diskon){
                                // console.log(diskon.data[0].value)
                                $("#level_mitra").val(level.data.nama)
                                $("#diskon_mitra").val(diskon.data[0].value)
                            })
                        })
                    })
                }else{
                    $("#pelanggan_id").attr('disabled', false)
                    $("#diskon_mitra").val(0)
                    $("#level_mitra").val('')
                }
            })

            $("#voucher_id").change(function(){
                var voucher_id = $(this).val()
                $(".diskonInput .input-group-addon").remove()
                if(voucher_id != ''){
                    $.get(apiUrl+'voucher/'+voucher_id, function(voucher){
                        $("#diskon_voucher").val(voucher.data.diskon)
                        $("#diskonVoucher").attr('tipe', voucher.data.tipe)
                        if(voucher.data.tipe == 'persen'){
                            $("#diskonVoucher").val(voucher.data.diskon)
                            $(".diskonInput").append(`
                                <span class="input-group-addon">%</span>
                            `)
                        }else{
                            $("#diskonVoucher").val(formatRupiah(voucher.data.diskon))
                            $(".diskonInput").prepend(`
                                <span class="input-group-addon">RP.</span>
                            `)
                        }
                    })
                }else{
                    $("#diskonVoucher").val(0)
                    $("#diskon_voucher").val(0)
                }
            })

            $('#add_barang_button').click(function () {
                var statusStok = 1;
                var jumlah = isNaN(parseInt($("[name='jumlah_barang']").val())) ? 0 : parseInt($("[name='jumlah_barang']").val());
                var barang_id = parseInt($("[name='barang_id']").val());
                $.get(apiUrl+'barang/'+$("[name='barang_id']").val(), function(res){
                    if (res.success) {
                        if(res.data.tipe == 'Reguler'){
                            if(jumlah == 0){
                                swal("Peringatan!", "Masukan jumlah barang", "warning")
                            }else{
                                 $.ajax({
                                    type: 'GET',
                                    url: "{!! url("api/stok") !!}/" + $("[name='barang_id']").val(),
                                    success: function (result) {
                                        var stok = result.data.stok;

                                        if ($.isEmptyObject(result.data)) {
                                            swal("Maaf, Terjadi Kesalahan.", "Gagal mendapatkan data stok barang.", "error");
                                        } else {
                                            if (stok == 0) {
                                                swal("Peringatan!", "Stok barang habis.", "warning");
                                            } else if ((stok - jumlah) < 0) {
                                                swal("Peringatan!", "Stok barang tidak cukup.", "warning");
                                            } else {
                                                addBarang($("[name='barang_id']").val());
                                            }
                                        }
                                    },
                                    error: function (err) {

                                    }
                                });
                            }
                        }else if(res.data.tipe == 'Paket'){
                            $(".overlay").show();
                            if(jumlah == 0){
                                swal("Peringatan!", "Masukan jumlah paket", "warning")
                                $(".overlay").hide();
                            }else{
                                $.get(apiUrl+'promo', function(paket){
                                    var barangIdPromo = barang_id
                                    var dataPaket = paket.data.find(function({ barang_id }){
                                        return barang_id == barangIdPromo
                                    })
                                    console.log(dataPaket)
                                    if(dataPaket == undefined || dataPaket == null){
                                        swal("Perhatian!", "Paket masih belum siap!", "warning")
                                        $(".overlay").hide();
                                    }

                                    $.get(apiUrl+'checkavaiablepaket/'+dataPaket.id, function(check){
                                        if(check.success){
                                            $.get(apiUrl+'barangpromo', function(barangPaket){
                                                var dataBarangPaket = barangPaket.data.filter(function(barang){
                                                    return barang.promo_id == dataPaket.id
                                                })

                                                if(dataBarangPaket == undefined || dataBarangPaket == null){
                                                    swal("Perhatian!", "Paket masih belum ad barang!", "warning")
                                                    $(".overlay").hide();
                                                }
                                                if ($('.id_barang_' + barang_id).length == 0) {
                                                    $(".overlay").show();
                                                    $.get(apiUrl+'harga', function(hargaBarang){
                                                        var id_barang = parseInt(barang_id)
                                                        var harga = hargaBarang.data.find( function({ barang_id }){
                                                            return barang_id == id_barang
                                                        })
                                                        var namaPaket = $("[name='barang_id'] option:selected").html();
                                                        subtotal += parseInt(harga.harga) * jumlah;
                                                        $('.subtotal').html(formatRupiah(subtotal));
                                                        $("tbody").append(`
                                                            <tr class="id_barang_`+ barang_id+`" id-paket="`+ barang_id +`">
                                                                <td style="font-weigth: 600;">Paket `+ namaPaket +`</td>
                                                                <td>Rp. <span>`+ formatRupiah(parseInt(harga.harga)) +`</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="font-weigth: 600;">`+ jumlah +`</td>
                                                                <td>Rp. <span>`+ formatRupiah(harga.harga * jumlah) +`</span></td>
                                                                <td>
                                                                    <button class='delete_paket btn btn-danger btn-xs' data-id="`+ barang_id+`" type='button'>
                                                                        <i class='fa fa-times' aria-hidden='true'></i>
                                                                    </button>
                                                                </td>
                                                                <input name='barang_penjualan[]' type='hidden' value='` + barang_id +`'>
                                                                <input name='jumlah_barang_penjualan[]' type='hidden' value='`+ jumlah +`'>
                                                                <input name='diskon[]' type='hidden' value='false'>
                                                            </tr>
                                                        `)
                                                        $(".overlay").hide();
                                                    })
                                                }else{
                                                    $.get(apiUrl+'harga', function(hargaBarang){
                                                        $(".overlay").show();
                                                        var id_barang = barang_id
                                                        var harga = hargaBarang.data.find( function({ barang_id }){
                                                            return barang_id == id_barang
                                                        })
                                                        var jumlah_barang = parseInt($(`[id-paket='`+ barang_id +`']`).children().eq(4).html().replace(/[^,\d]/g, ""));
                                                        var hasil = jumlah_barang + jumlah;
                                                        var subtotal_barang = harga.harga * hasil;

                                                        $(`[id-paket='`+ barang_id +`']`).children().eq(4).html(hasil);
                                                        $(`[id-paket='`+ barang_id +`']`).children().eq(5).html('Rp<span>' + formatRupiah(subtotal_barang) + '</span>');
                                                        $(`[id-paket='`+ barang_id +`']`).children().eq(8).val(hasil);

                                                        subtotal += parseInt(harga.harga * jumlah);
                                                        $('.subtotal').html(formatRupiah(subtotal));
                                                        $(".overlay").hide();
                                                    })
                                                }
                                                // else{
                                                //     var jumlah_barang = parseInt($('.id_barang_' + barang_id).children().eq(1).html());
                                                //     var hasil = jumlah_barang + 1;

                                                //     $('.id_barang_' + barang_id).children().eq(1).html(hasil);
                                                // }
                                                dataBarangPaket.forEach(function(row){
                                                    $(".overlay").show();
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: "{!! url("api/stok") !!}/" + row.barang_id,
                                                        success: function (result) {
                                                            var stok = result.data.stok;

                                                            if ($.isEmptyObject(result.data)) {
                                                                swal("Maaf, Terjadi Kesalahan.", "Gagal mendapatkan data stok barang.", "error");
                                                                $(".overlay").hide();
                                                            } else {
                                                                if (stok == 0) {
                                                                    swal("Peringatan!", "Stok barang habis.", "warning");
                                                                    $(".overlay").hide();
                                                                } else {
                                                                    $(".overlay").show();
                                                                    addBarang(row.barang_id, row.jumlah * jumlah , barang_id);
                                                                }
                                                            }
                                                        },
                                                        error: function (err) {

                                                        }
                                                    });
                                                })
                                                $(".overlay").hide();
                                            })
                                        }else{
                                            swal("Perhatian!", "Paket masih belum siap!", "warning")
                                            $(".overlay").hide();
                                        }
                                    }).done(function(msg){}).fail(function(xhr, status, error) {
                                        swal("Perhatian!", "Barang Dalam Paket masih belum siap!", "warning")
                                        $(".overlay").hide();
                                        // var err = JSON.parse(xhr.responseText).errors
                                        // $('.overlay').hide()
                                        // if(err === undefined){
                                        //     swal({
                                        //         type: "warning",
                                        //         title: "Warning",
                                        //         text: JSON.parse(xhr.responseText).message,
                                        //         showConfirmButton: true,
                                        //         timer: 3000
                                        //     });
                                        // }else{
                                        //     for (const property in err) {
                                        //         swal({
                                        //             type: "warning",
                                        //             title: "Warning",
                                        //             text: `${property}: ${err[property]}`,
                                        //             showConfirmButton: true,
                                        //             timer: 3000
                                        //         });
                                        //     }
                                        // }
                                    });
                                })
                            }
                        }
                    }
                })

            });

            $("tbody").on('click', '.barang_delete', function () {
                subtotal -= parseInt($(this).parent().siblings().eq(5).children().html().replace(/[^,\d]/g, ""));
                // console.log($(this).parent().siblings().eq(3).children().html());
                $('.subtotal').html(formatRupiah(subtotal));
                $(this).parent().parent().remove();
            });

            $("tbody").on('click', '.disableDiskon', function () {
                var checked = $(this).prop('checked');
                var harga = parseInt($(this).parent().parent().siblings().eq(1).html().replace(/[^,\d]/g, ""));
                var tipeDiskon = $(this).parent().parent().attr('tipe');
                var nilaiDiskon = $(this).parent().parent().attr('diskon');
                var diskon = parseInt($(this).parent().siblings().eq(0).html().replace(/[^,\d]/g, ""));
                var jumlah = parseInt($(this).parent().parent().siblings().eq(3).html().replace(/[^,\d]/g, ""));
                var totalSebelum = parseInt($(this).parent().parent().siblings().eq(4).children().html().replace(/[^,\d]/g, ""));
                if(checked){
                    if(tipeDiskon == 'rupiah'){
                        var hargaDiskon = harga - nilaiDiskon;
                        $(this).parent().siblings().eq(0).html(formatRupiah(nilaiDiskon, "Rp. "))
                    }else if(tipeDiskon == "persen"){
                        $(this).parent().siblings().eq(0).html(nilaiDiskon+'%')
                        var hargaDiskon = harga - (nilaiDiskon / 100 * harga);
                    }
                    var total = hargaDiskon * jumlah;
                    subtotal -= totalSebelum
                    subtotal += total
                    $('.subtotal').html(formatRupiah(subtotal));
                    $(this).parent().parent().siblings().eq(8).val(true);
                }else{
                    $(this).parent().siblings().eq(0).html(0)
                    var hargaDiskon = harga;
                    var total = harga * jumlah;
                    subtotal -= totalSebelum
                    subtotal += total
                    $('.subtotal').html(formatRupiah(subtotal));
                    $(this).parent().parent().siblings().eq(8).val(false);
                }
                $(this).parent().parent().siblings().eq(2).html(formatRupiah(hargaDiskon, "Rp. "));
                $(this).parent().parent().siblings().eq(3).html(jumlah);
                $(this).parent().parent().siblings().eq(4).children().html(formatRupiah(total));
            });

            $("tbody").on('click', '.delete_paket', function () {
                subtotal -= parseInt($(this).parent().siblings().eq(5).children().html().replace(/[^,\d]/g, ""));
                // console.log($(this).parent().siblings().eq(1).children().html());
                $('.subtotal').html(formatRupiah(subtotal));
                $('[id-paket="'+ $(this).attr('data-id') +'"]').remove();
                // grand_total = subtotal;
            });

            $("#bayar_input").keyup(function () {
                $(this).val(formatRupiah(this.value))
                if(parseInt($(this).val().replace(/[^,\d]/g, "")) >= grand_total){
                    $(this).css('border' ,'1px solid #ccc')
                    $("[name='kembali']").val(formatRupiah($(this).val().replace(/[^,\d]/g, "") - grand_total));
                    $("#kembali_input").val(formatRupiah($(this).val().replace(/[^,\d]/g, "") - grand_total))
                }else{
                    $(this).css('border' ,'1px solid red')
                    $("[name='kembali']").val(formatRupiah($(this).val().replace(/[^,\d]/g, "") - grand_total));
                    $("#kembali_input").val(formatRupiah($(this).val().replace(/[^,\d]/g, "") - grand_total))
                }
                $("[name='bayar']").val($(this).val().replace(/[^,\d]/g, ""))
            });

            $("#Inpongkir").keyup(function (event) {
                $(this).val(formatRupiah(this.value))
                $("[name='ongkir']").val($(this).val().replace(/[^,\d]/g, ""))
            });

            $("#btnHitung").click(function(){
                $("[name='grand_total']").val(subtotal);
                var diskon_voucher = (parseInt($("#diskon_voucher").val()) <= 0 || $("#diskon_voucher").val() == '') ? 0 : parseInt($("#diskon_voucher").val())
                var tipe_diskon_voucher = $("#diskonVoucher").attr('tipe')
                var diskon_mitra = (parseInt($("#diskon_mitra").val()) <= 0 || $("#diskon_mitra").val() == '') ? 0 : parseInt($("#diskon_mitra").val())
                var ppn = (parseInt($("[name='ppn']").val()) <= 0 || $("[name='ppn']").val() == '') ? 0 : parseInt($("[name='ppn']").val())
                var setelah_mitra = subtotal - (diskon_mitra / 100 * subtotal)

                if(diskon_voucher != 0){
                    if(tipe_diskon_voucher == 'persen'){
                        var setelah_voucher = setelah_mitra - (diskon_voucher / 100 * setelah_mitra)
                    }else if(tipe_diskon_voucher == 'rupiah'){
                        var setelah_voucher = setelah_mitra - diskon_voucher
                    }
                }else{
                    var setelah_voucher = setelah_mitra - 0
                }

                var setelah_ppn = setelah_voucher + (ppn / 100 * setelah_voucher)
                var ongkir = (parseInt($("[name='ongkir']").val()) <= 0 || $("[name='ongkir']").val() == '') ? 0 : parseInt($("[name='ongkir']").val())
                grand_total = parseInt(parseFloat(setelah_ppn.toString()).toFixed(0)) + parseInt(ongkir)
                $("[name='total']").val(grand_total);
                $(".grand_total").html(formatRupiah(grand_total));
                $("#bayar_input").attr('readonly', false)
            })

            $('#btnAddPenjualan').on('click',function(e){
                e.preventDefault();
                var form = $(this).parents('form');
                if($("#mitra_id").val() == '' && $("#pelanggan_id").val() == ''){
                    swal("Gagal!","Mitra dan Pelanggan tidak boleh kosong. Pilih salah satu", "warning")
                }else{
                    swal({
                        title: "Apakah Anda Yakin?",
                        text: "Data yang disimpan tidak akan bisa di ubah lagi!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#39b55a",
                        confirmButtonText: "Ya, simpan ini!",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if (isConfirm) form.submit();
                    });
                }
            });

        });
    });
</script>

@endsection


