@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Purchase Order
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'purchaseOrder.store', 'id' => 'formAddPurchaseOrder']) !!}                        

                        @include('purchase_order.fields')  

                        @include('purchase_order.blist')                    

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnAddPurchase']) !!}
                            <a href="{{ route('purchaseOrder.index') }}" class="btn btn-default">Cancel</a>
                        </div>

                    {!! Form::close() !!}
                </div>                
            </div>                        
        </div>        
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#po_kode").val("PO0" + makeid(5))
                
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
                                                    console.log(dataBarang);
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
                                                                    <td scope="col">` + formatRupiah(harga.harga,"Rp. ") + `</td>
                                                                    <td scope="col" data-stok="` + inar + `">` + stok.stok + `</td>
                                                                    <td scope="col">
                                                                        <input type="number" min="1" style="width: 90px;" class="form-control text-center inpsb sb-` + inar + `" data-id="` + inar + `" value="` + 1 + `"> 
                                                                    </td>                     
                                                                    <td scope="col">
                                                                        <button type="button" class="btn btn-danger btndelbarang" data-id="` + inar + `">
                                                                            <i class="fa fa-close"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            `)
                                                            dataBarang.push({
                                                                    'id': inar,
                                                                    'barang_id': value,
                                                                    "jumlah": 1
                                                                })
                                                                // noListBarangAdd++
                                                        } else {
                                                            dataBarang[index].jumlah = dataBarang[index].jumlah + 1
                                                            $(".sb-" + dataBarang[index].id).val(dataBarang[index].jumlah)
                                                        }
                                                    } else {
                                                        $(".box-barang").html('');
                                                        $(".box-barang").append(`
                                                          <tr data-barang="` + noListBarangAdd + `">
                                                            <td scope="col">#</td>
                                                            <td scope="col">` + namaBarang + `</td>
                                                            <td scope="col"> ` + formatRupiah(harga.harga,"Rp. ") + `</td>
                                                            <td scope="col" data-stok="` + noListBarangAdd + `">` + stok.stok + `</td>
                                                            <td scope="col">
                                                                <input type="number" min="1" style="width: 90px;" class="form-control text-center inpsb sb-` + noListBarangAdd + `" data-id="` + noListBarangAdd + `" value="` + 1 + `"> 
                                                            </td>                     
                                                            <td scope="col">
                                                                <button type="button" class="btn btn-danger btndelbarang" data-id="` + noListBarangAdd + `">
                                                                      <i class="fa fa-close"></i>
                                                                  </button>
                                                            </td>
                                                        </tr>    
                                                          `)
                                                        dataBarang[noListBarangAdd] = {
                                                            'id': noListBarangAdd,
                                                            'barang_id': value,
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

                                                    $(".inpsb").change(function() {
                                                        var id = parseInt($(this).attr('data-id'));
                                                        var stok = $("[data-barang='" + id + "'] [data-stok='" + id + "']").html()
                                                        for (var i = 0; i < dataBarang.length; i++) {
                                                            if (dataBarang[i].id === id) {

                                                                if ($(this).val() === '' || !$(this).val().trim()) {
                                                                    dataBarang[i].jumlah = 1
                                                                    $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                                                                }
                                                                
                                                                else {
                                                                    dataBarang[i].jumlah = parseInt($(this).val())
                                                                    $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                                                                }

                                                            }
                                                        }
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

                $(".btndelbarang").click(function() {

                    var id = parseInt($(this).attr('data-id'));
                    for (var i = 0; i < dataBarang.length; i++) {
                        if (dataBarang[i].id === id) {
                            dataBarang.splice(i, 1);
                        }
                    }
                    $("[data-barang='" + id + "']").remove()
                })

                $(".inpsb").change(function() {
                    var id = parseInt($(this).attr('data-id'));
                    var stok = $("[data-barang='" + id + "'] [data-stok='" + id + "']").html()
                    for (var i = 0; i < dataBarang.length; i++) {
                        if (dataBarang[i].id === id) {

                            if ($(this).val() === '' || !$(this).val().trim()) {
                                dataBarang[i].jumlah = 1
                                $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                            }
                            // else if($(this).val() < parseInt(stok)){ 
                            //   // var jumlahBaru = parseInt($(this).val()) + parseInt(dataBarang[i].jumlah);                                                 
                            //   if(parseInt($(this).val()) < parseInt(stok)){
                            //       dataBarang[i].jumlah = parseInt($(this).val())
                            //       $(".sb-"+dataBarang[i].id).val(dataBarang[i].jumlah)
                            //   }else{
                            //     dataBarang[i].jumlah = parseInt(stok)
                            //     $(".sb-"+dataBarang[i].id).val(dataBarang[i].jumlah)       
                            //   }
                            // }
                            else {
                                dataBarang[i].jumlah = parseInt($(this).val())
                                $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                            }

                        }
                    }
                })

                $("#formAddPurchaseOrder #btnAddPurchase").click(function(e) {
                    console.log('#btnAddPurchase clicked')
                    $(".overlay").show();

                    e.preventDefault();

                    var values = {};

                    $.each($('#formAddPurchaseOrder').serializeArray(), function(i, field) {
                        if (field.value === '' || !field.value.trim()) {
                            $(".overlay").hide();
                            swal({
                                type: "warning",
                                title: "Error",
                                text: field.name.toUpperCase() + " kosong, Mohon di isi",
                                showConfirmButton: true,
                                timer: 2000
                            });
                            return false;
                        } else {
                            values[field.name] = field.value;
                        }
                    });
                    console.log(values)

                    if (Object.keys(values).length === 4) {

                        if(dataBarang.length != 0 ){
                            $.post(apiUrl + 'purchase_order', values, function(res) {

                                if (res.success) {

                                    var respo = res.data
                                    for (var i = 0; i < dataBarang.length; i++) {
                                        var detailpo = {
                                            _token: values._token,
                                            purchase_order_id: respo.id,
                                            barang_id: dataBarang[i].barang_id,
                                            jumlah: dataBarang[i].jumlah,
                                            jumlah_kurang: dataBarang[i].jumlah
                                        }

                                        $.post(apiUrl + 'detail_purchase_order', detailpo).done(function(e) {
                                            if (!res.success) {
                                                swal({
                                                    type: "warning",
                                                    title: "Error",
                                                    text: e.message,
                                                    showConfirmButton: true,
                                                    timer: 2000
                                                });
                                                return false;
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
                                            console.log(status)
                                            console.log(error)
                                            console.log(error)                        
                                        });

                                        if (i == (dataBarang.length - 1)) {

                                            $(".overlay").show();
                                            swal({
                                                type: "success",
                                                title: "Succcess",
                                                text: res.message,
                                                showConfirmButton: true,
                                                timer: 2000
                                            });
                                            window.location.href = baseUrl+'purchaseOrder'
                                        }

                                    }

                                } else {
                                    swal({
                                        type: "warning",
                                        title: "Error",
                                        text: res.message,
                                        showConfirmButton: true,
                                        timer: 2000
                                    });
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
                        }else{
                            $(".overlay").hide();
                            swal({
                                type: "warning",
                                title: "Error",
                                text: "Barang Kosong, Mohon Tambah kan Terlebih dahulu",
                                showConfirmButton: true,
                                timer: 2000
                            });
                        }
                    }

                })
            })
        })
    </script>
@endsection


