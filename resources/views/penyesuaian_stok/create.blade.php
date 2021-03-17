@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penyesuaian Stok
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 15px;">            
                        {!! Form::label('', 'Nama Barang:') !!}
                        <!-- <div class="input-group"> -->
                          {!! Form::select('', $barangItems, null, ['class' => 'select2 form-control blistpo']) !!}                               
                            <button class="btn btn-block btn-primary btnaddb pull-right" type="button" data-id="1" style="margin-top: 10px; margin-bottom: 10px;">
                                <i class="fa fa-plus"></i> Tambah Barang
                            </button>              
                        <!-- </div> -->
                    </div>        
                </div>       
            </div>                    
        </div>        
        {!! Form::open(['route' => 'penyesuaianStok.store']) !!}                    
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">                    
                          <div class="table-responsive">                    
                              <table class="table table-bordered table-striped table-hover" id="tableViewBarangKB">
                                <thead>                
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Stok Database</th>
                                    <th scope="col">Stok Lapangan</th>
                                    <th>Tipe</th>
                                    <th scope="col">Jumlah</th>
                                    <th>Action</th>
                                  </tr>              
                                </thead>
                                <tbody class="box-barang">                                                    
                                    <tr>
                                        <th scope="col" align="center" colspan="6">Tidak ada barang</th>                   
                                    </tr>  
                                </tbody>                                
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    @include('penyesuaian_stok.fields')
                </div>
            </div>
        {!! Form::close() !!}           
    </div>
<script>
    $(document).ready(function(){
        $(function(){
            var dataBarang = []

            var noListBarangAdd = 0;

            var noUrutBarang = 1;

            $(".btnaddb").click(function() {
                $(".overlay").show();
                var value = $(".blistpo").val();
                var namaBarang = $(".blistpo option:selected").html();
                // var idBarang = $("[data-barang='']").html();
                try {
                    if (value !== '' || !field.value.trim()) {
                        var harga = ''
                        var stok = ''
                        var success = ''
                        $.get(apiUrl + 'stok/', function(res) {
                            // console.log(res)
                            if (res.success) {
                                success = res.success
                                stok = res.data.find(function({
                                    barang_id
                                }) {
                                    return barang_id == value
                                })
                                if (stok !== undefined) {
                                    $.get(apiUrl + 'harga/', function(res) {

                                        if (res.success) {
                                            success = res.success
                                            harga = res.data.find(function({
                                                barang_id
                                            }) {
                                                return barang_id == value
                                            })
                                            if (harga !== undefined) {
                                                // console.log(dataBarang);
                                                if (dataBarang.length != 0) {
                                                    const index = dataBarang.findIndex(barang => barang.barang_id == value)
                                                    var cekIndex = dataBarang.findIndex(barang => barang.id == dataBarang.length);
                                                    if(cekIndex === -1){
                                                        var inar = dataBarang.length
                                                    }else{
                                                        var inar = dataBarang[cekIndex].id + 1;
                                                    }
                                                    // console.log(dataBarang);
                                                    // if(cekIndex)
                                                    if (index === -1) {
                                                        $(".box-barang").append(`
                                                            <tr data-barang="` + inar + `">
                                                                <td scope="col">#</td>
                                                                <td scope="col">` + namaBarang + `</td>
                                                                <td scope="col" data-stok="` + inar + `">` + stok.stok + `</td>
                                                                <td scope="col">
                                                                    <input type="number" min="1" style="width: 90px;" class="form-control text-center stokLp" data-id="` + inar + `"> 
                                                                </td>                                                                    
                                                                <td class="tipe-` + inar + `">

                                                                </td>
                                                                <td class="jumlah-` + inar + `">

                                                                </td>
                                                                <td scope="col">
                                                                    <button type="button" class="btn btn-danger btndelbarang" data-id="` + inar + `">
                                                                        <i class="fa fa-close"></i>
                                                                    </button>
                                                                </td>
                                                                <input name='barang_penyesuaian[]' type='hidden' value='` + value + `'>
                                                                <input name='stokDatabase[]' type='hidden' value='` + stok.stok + `'>
                                                                <input name='stokLapangan[]' class="stoklapangan-`+inar+`" type='hidden'>
                                                                <input name='tipe[]' type='hidden' class="tipePenye-`+ inar +`">
                                                                <input name='jumlah_barang_penyesuaian[]' class="jumlahPenye-`+ inar +`" type='hidden'>
                                                            </tr>
                                                        `)
                                                        dataBarang.push({
                                                                'id': inar,
                                                                'barang_id': value,
                                                                'stokDatabase' : stok.stok,
                                                                'stokLapangan' : 0,
                                                                'tipe' : '',
                                                                "jumlah": 1
                                                            })
                                                            // noListBarangAdd++
                                                    } else {
                                                        
                                                    }
                                                } else {
                                                    $(".box-barang").html('');
                                                    $(".box-barang").append(`
                                                      <tr data-barang="` + noListBarangAdd + `">
                                                        <td scope="col">#</td>
                                                        <td scope="col">` + namaBarang + `</td>
                                                        <td scope="col" data-stok="` + noListBarangAdd + `">` + stok.stok + `</td>
                                                        <td scope="col">
                                                            <input type="number" min="1" style="width: 90px;" class="form-control text-center stokLp" data-id="` + noListBarangAdd + `"> 
                                                        </td>
                                                        <td class="tipe-` + noListBarangAdd + `">

                                                        </td>
                                                        <td class="jumlah-` + noListBarangAdd + `">

                                                        </td>                     
                                                        <td scope="col">
                                                            <button type="button" class="btn btn-danger btndelbarang" data-id="` + noListBarangAdd + `">
                                                                  <i class="fa fa-close"></i>
                                                              </button>
                                                        </td>
                                                        <input name='barang_penyesuaian[]' type='hidden' value='` + value + `'>
                                                        <input name='stokDatabase[]' type='hidden' value='` + stok.stok + `'>
                                                        <input name='stokLapangan[]' class="stoklapangan-`+noListBarangAdd+`" type='hidden'>
                                                        <input name='tipe[]' type='hidden' class="tipePenye-`+ noListBarangAdd +`">
                                                        <input name='jumlah_barang_penyesuaian[]' class="jumlahPenye-`+ noListBarangAdd +`" type='hidden'>
                                                    </tr>    
                                                      `)
                                                    dataBarang[noListBarangAdd] = {
                                                        'id': noListBarangAdd,
                                                        'barang_id': value,
                                                        'stokDatabase' : stok.stok,
                                                        'stokLapangan' : 0,
                                                        'tipe' : '',
                                                        "jumlah": 1
                                                    }
                                                    noListBarangAdd++
                                                }

                                                $(".overlay").hide();

                                                $(".btndelbarang").click(function() {

                                                    var id = parseInt($(this).attr('data-id'));
                                                    for (var i = 0; i < dataBarang.length; i++) {
                                                        if (dataBarang[i].id === id) {
                                                            dataBarang.splice(i, 1);
                                                        }
                                                    }
                                                    $("[data-barang='" + id + "']").remove()
                                                    if(dataBarang.length == 0){
                                                         $(".box-barang").html(`<tr>
                                                        <th scope="col" colspan="6">Tidak ada barang</th>                   
                                                    </tr>`);
                                                    }
                                                })                                                    

                                                $(".stokLp").change(function(){                                                        
                                                    var id = $(this).attr('data-id') 
                                                    if(this.value != ''){                                                        
                                                        var stokLapangan = parseInt(this.value)
                                                        var stokDatabase = parseInt($("[data-barang='" + id + "'] [data-stok='" + id + "']").html())                                                            
                                                        if(stokLapangan > stokDatabase){                                                                
                                                            $('.jumlah-'+id).html(stokLapangan - stokDatabase)
                                                            $('.tipe-'+id).html('Masuk')
                                                            for (var i = 0; i < dataBarang.length; i++) {
                                                                if (dataBarang[i].id == id) {
                                                                    dataBarang[i].stokLapangan = stokLapangan;
                                                                    dataBarang[i].tipe = "Masuk";
                                                                    dataBarang[i].jumlah = stokLapangan - stokDatabase;
                                                                    $(".stoklapangan-"+id).val(stokLapangan)
                                                                    $(".tipePenye-"+id).val('Masuk')
                                                                    $(".jumlahPenye-"+id).val(stokLapangan - stokDatabase)
                                                                }
                                                            }
                                                        }else{                                                                
                                                            $('.jumlah-'+id).html(stokDatabase - stokLapangan)
                                                            $('.tipe-'+id).html('Keluar')
                                                            for (var i = 0; i < dataBarang.length; i++) {
                                                                if (dataBarang[i].id == id) {
                                                                    dataBarang[i].stokLapangan = stokLapangan;
                                                                    dataBarang[i].tipe = "Keluar";
                                                                    dataBarang[i].jumlah = stokDatabase - stokLapangan;
                                                                    $(".stoklapangan-"+id).val(stokLapangan)
                                                                    $(".tipePenye-"+id).val('Keluar')
                                                                    $(".jumlahPenye-"+id).val(stokDatabase - stokLapangan)
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                        $('.jumlah-'+id).html('')
                                                        $('.tipe-'+id).html('')
                                                        for (var i = 0; i < dataBarang.length; i++) {
                                                            if (dataBarang[i].id == id) {
                                                                dataBarang[i].stokLapangan = 0;
                                                                dataBarang[i].tipe = "";
                                                                dataBarang[i].jumlah = 0;
                                                                $("[data-barang='" + id + "'] [data-stoklapangan='"+id+"']").val('')
                                                                $("[data-barang='" + id + "'] [data-tipe='"+id+"']").val('')
                                                                $("[data-barang='" + id + "'] [data-jumlah='"+id+"']").val('')
                                                            }
                                                        }
                                                    }
                                                    // $(".stoklapangan-"+id).val() = 10;
                                                })

                                            } else {
                                                $(".overlay").hide();
                                                swal({
                                                    type: "warning",
                                                    title: "Error",
                                                    text: "Barang ini Belum Punya harga",
                                                    showConfirmButton: true,
                                                    timer: 2000
                                                });
                                            }
                                        } else {
                                            swal({
                                                type: "warning",
                                                title: "Error",
                                                text: res.message,
                                                showConfirmButton: true,
                                                timer: 2000
                                            });
                                            $(".overlay").hide();
                                        }
                                    }).done(function(msg){}).fail(function(xhr, status, error) {
                                        // console.log()
                                        var err = JSON.parse(xhr.responseText).errors
                                        $('.overlay').hide()
                                        for (const property in err) {
                                            // console.log(`${property}: ${err[property]}`);
                                            swal({
                                                type: "warning",
                                                title: "Warning",
                                                text: `${property}: ${err[property]}`,
                                                showConfirmButton: true,
                                                timer: 3000
                                            });
                                        }
                                        // console.log(status)
                                        // console.log(error)
                                        // console.log(error)                        
                                    });
                                } else {
                                    swal({
                                        type: "warning",
                                        title: "Error",
                                        text: "Barang ini Belum Punya Stok",
                                        showConfirmButton: true,
                                        timer: 2000
                                    });
                                    $(".overlay").hide();
                                }
                            } else {
                                swal({
                                    type: "warning",
                                    title: "Error",
                                    text: res.message,
                                    showConfirmButton: true,
                                    timer: 2000
                                });
                                $(".overlay").hide();
                            }
                        }).done(function(msg){}).fail(function(xhr, status, error) {
                            // console.log()
                            var err = JSON.parse(xhr.responseText).errors
                            $('.overlay').hide()
                            for (const property in err) {
                                // console.log(`${property}: ${err[property]}`);
                                swal({
                                    type: "warning",
                                    title: "Warning",
                                    text: `${property}: ${err[property]}`,
                                    showConfirmButton: true,
                                    timer: 3000
                                });
                            }
                            // console.log(status)
                            // console.log(error)
                            // console.log(error)                        
                        });
                    }
                } catch (err) {
                    swal({
                        type: "warning",
                        title: "Error",
                        text: err.toUpperCase(),
                        showConfirmButton: true,
                        timer: 2000
                    });
                    $(".overlay").hide();
                }
            })
            // if($("#barang_id").val() != '' || $("#barang_id").val() != undefined || $("#barang_id").val() != null ){
            //     // console.log($("#barang_id").val())
            //     $(".overlay").show();
            //     $.get(apiUrl+'stok', function(res){

            //         var dataStok = res.data.find(element => element.barang_id == $("#barang_id").val());

            //         $("#stok_database").val(dataStok.stok)
            //         $(".overlay").hide();
            //     })
            // }

            $('#createField').on('click',function(e){
                e.preventDefault();
                var form = $(this).parents('form');
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
            });
        })
    })
</script>
@endsection
