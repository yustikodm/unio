@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Terima Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($terimaBarang, ['route' => ['terimaBarang.update', $terimaBarang->id], 'method' => 'patch', 'id' => 'formEditTerimabarang']) !!}

                        @include('terima_barang.fields')

                        @include('terima_barang.blistedit')

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary', "id" => 'btneditTerimabarang']) !!}
                            <a href="{{ route('terimaBarang.index') }}" class="btn btn-default">Cancel</a>
                        </div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   <script type="text/javascript">
     $(document).ready(function(){
        $(function(){
            var  dataBarang = []
            var  dataBarangKirim = []
            var  terimaid = "{{ $terimaBarang->id }}";
            var  dkbid = "{{ $terimaBarang->kirim_barang_id }}";

            // console.log(dkbid)
            // console.log(terimaid)

            $.get(apiUrl + 'getBarangKirimByid/' + dkbid, function(res) {
                dataBarang = res
                console.log(dataBarang)
                $.get(apiUrl + "getBarangTerima/" + terimaid, function(has) {
                    console.log(has.barangTerima)                    
                    has.barangTerima.forEach(function(resu) {
                        dataBarangKirim.push({
                            id: resu.id,
                            barang_id: resu.barang_id,
                            jumlah_kurang: resu.jumlah_kurang,
                            jumlah: resu.jumlah_kurang,
                            harga: resu.harga
                        });
                    })
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

            $(".checkBarang").change(function() {
                 if ($(this).prop('checked') == true) {
                        var barangRow = dataBarang.find(({ barang_id }) => {
                            return barang_id == $(this).attr('data-id')
                        })
                        dataBarangKirim.push(barangRow)
                        var idrowbarang = $(this).attr('data-id')
                        $("input[type=number][data-id="+idrowbarang+"]").attr('disabled', false)                                    
                        var hargab = 0
                        var jumlahb = 0
                        for (var i = 0; i < dataBarangKirim.length; i++) {
                            jumlahb = dataBarangKirim[i].jumlah_kurang + jumlahb
                            hargab = dataBarangKirim[i].jumlah_kurang * dataBarangKirim[i].harga + hargab
                        }
                        $(".totalharga").html(formatRupiah('"'+hargab+'"', 'Rp. '))
                        $(".totaljumlah").html(jumlahb)
                    } else {                                    
                        var idDO = parseInt($(this).attr('data-id'));
                        var barangRow = dataBarang.find(({ barang_id }) => {
                            return barang_id == idDO
                        })
                        $("input[type=number][data-id="+idDO+"]").attr('disabled', true)                                    
                        for (var i = 0; i < dataBarangKirim.length; i++) {
                            if (dataBarangKirim[i].barang_id === idDO) {                                            
                                $("input[type=number][data-id="+idDO+"]").val(barangRow.jumlah)
                                $('.checkBarang-'+idDO).html('')
                                dataBarangKirim.splice(i, 1);
                            }
                        }
                        if (dataBarangKirim.length != 0) {
                            var hargab = 0
                            var jumlahb = 0
                            for (var i = 0; i < dataBarangKirim.length; i++) {
                                jumlahb = dataBarangKirim[i].jumlah_kurang + jumlahb
                                hargab = dataBarangKirim[i].jumlah_kurang * dataBarangKirim[i].harga + hargab
                            }
                            $(".totalharga").html(formatRupiah('"'+hargab+'"', 'Rp. '))
                            $(".totaljumlah").html(jumlahb)
                        } else {
                            $(".totalharga").html('')
                            $(".totaljumlah").html('')
                        }
                    }
            })

            $(".jumlahKirimBarang").change(function(){
                // console.log(this.value)
                // console.log($(this).attr('data-id'))
                var idbarang = $(this).attr('data-id')
                var barangRow = dataBarangKirim.find(({ barang_id }) => {
                    return barang_id == idbarang
                })

                var barangBK = dataBarang.find(({ barang_id }) => {
                    return barang_id == idbarang
                })
                if(this.value != ''){
                    if(parseInt(this.value) > barangBK.jumlah){
                        barangRow.jumlah_kurang = barangBK.jumlah  
                        this.value = barangBK.jumlah                                                                        
                        $('.checkBarang-'+idbarang).html(0)                                             
                    }else{
                        $('.checkBarang-'+idbarang).html(barangRow.jumlah - parseInt(this.value))
                        barangRow.jumlah_kurang =  parseInt(this.value)                         
                    }                                    
                    var hargab = 0
                    var jumlahb = 0
                    for (var i = 0; i < dataBarangKirim.length; i++) {
                        jumlahb = dataBarangKirim[i].jumlah_kurang + jumlahb
                        hargab = dataBarangKirim[i].jumlah_kurang * dataBarangKirim[i].harga + hargab
                    }
                    $(".totalharga").html(formatRupiah('"'+hargab+'"', 'Rp. '))
                    $(".totaljumlah").html(jumlahb)
                }else{
                    barangRow.jumlah_kurang =  1
                    this.value = 1                                                                  
                    var hargab = 0
                    var jumlahb = 0
                    for (var i = 0; i < dataBarangKirim.length; i++) {
                        jumlahb = dataBarangKirim[i].jumlah_kurang + jumlahb
                        hargab = dataBarangKirim[i].jumlah_kurang * dataBarangKirim[i].harga + hargab
                    }
                    $(".totalharga").html(formatRupiah('"'+hargab+'"', 'Rp. '))
                    $(".totaljumlah").html(jumlahb)
                }
            })

            $(".checkBarangAll").change(function() {                               
                if ($(this).prop('checked') == true) {
                    $(".checkBarang").prop('checked', true)
                    dataBarangKirim = []
                    for (var i = 0; i < dataBarang.length; i++) {
                        $("input[type=number][data-id="+dataBarang[i].barang_id+"]").attr('disabled', false) 
                        dataBarangKirim.push({
                            id: dataBarang[i].id,
                            barang_id: dataBarang[i].barang_id,
                            jumlah: dataBarang[i].jumlah,
                            jumlah_kurang: dataBarang[i].jumlah,
                            harga: dataBarang[i].harga
                        })
                    }
                    var hargab = 0
                    var jumlahb = 0
                    for (var i = 0; i < dataBarangKirim.length; i++) {
                        jumlahb = dataBarangKirim[i].jumlah + jumlahb
                        hargab = dataBarangKirim[i].jumlah * dataBarangKirim[i].harga + hargab
                    }
                    $(".totalharga").html(formatRupiah('"'+hargab+'"', 'Rp. '))
                    $(".totaljumlah").html(jumlahb)
                    // console.log(dataBarang)
                    // console.log(dataBarangKirim)
                } else {
                     for (var i = 0; i < dataBarang.length; i++) {
                        $("input[type=number][data-id="+dataBarang[i].barang_id+"]").attr('disabled', true)  
                        $("input[type=number][data-id="+dataBarang[i].barang_id+"]").val(dataBarang[i].jumlah)
                        $('.checkBarang-'+dataBarang[i].barang_id).html('')                             
                    }
                    $(".checkBarang").prop('checked', false)
                    dataBarangKirim = []
                    $(".totalharga").html('')
                    $(".totaljumlah").html('')
                }
            })

            $("#formEditTerimabarang #btneditTerimabarang").click(function(e) {

                $(".overlay").show();

                e.preventDefault();

                // console.log(dataBarangKirim)

                var values = {};

                $.each($('#formEditTerimabarang').serializeArray(), function(i, field) {
                    if (field.value === '' || !field.value.trim()) {
                        $(".overlay").hide();
                        swal({
                            type: "warning",
                            title: "Error",
                            text: field.name.toUpperCase() + " kosong, Mohon di isi",
                            showConfirmButton: false,
                            timer: 2000
                        });
                        return false;
                    } else {
                        values[field.name] = field.value;
                    }
                });

                // console.log(Object.keys(values).length)
                // console.log(values)
                if (Object.keys(values).length === 5) {               
                  if(dataBarangKirim.length != 0){
                     try {
                        $.ajax({
                            url: apiUrl+'terima_barang/'+terimaid,
                            data: values,
                            type: 'PUT',
                            success: function(coba) {
                                // console.log(coba)
                                if (coba.success) {
                                    var restb = coba.data

                                    $.get(apiUrl + 'deleteBarangTerima/' + terimaid, function(res) {
                                        if (res.success) {                                           
                                            for (var i = 0; i < dataBarangKirim.length; i++) {
                                                var detailtb = {
                                                    _token: values._token,
                                                    // purchase_order_id : restb.purchase_order_id,
                                                    terima_barang_id: restb.id,
                                                    barang_id: dataBarangKirim[i].barang_id,
                                                    jumlah : dataBarangKirim[i].jumlah_kurang,
                                                    jumlah_kurang: dataBarangKirim[i].jumlah_kurang
                                                }
                                                $.post(apiUrl + 'barang_terima', detailtb).done(function(e) {
                                                    if (!res.success) {
                                                        $(".overlay").hide();
                                                        swal({
                                                            type: "warning",
                                                            title: "Error",
                                                            text: e.message,
                                                            showConfirmButton: false,
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
                                                    // console.log(status)
                                                    // console.log(error)
                                                    // console.log(error)                        
                                                });

                                                if (i == (dataBarangKirim.length - 1)) {
                                                        $.get(apiUrl+'checkBarangBK/'+ restb.id, function(bdpo){
                                                        if(bdpo.success){
                                                            $(".overlay").hide();
                                                            swal({
                                                                  type: "success",
                                                                  title: "Succcess",
                                                                  text: coba.message,
                                                                  showConfirmButton: false,
                                                                  timer: 2000
                                                            });
                                                         window.location.href = baseUrl+'terimaBarang'
                                                        }else{

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
                                            }
                                            
                                        } else {
                                                $(".overlay").hide();
                                                swal({
                                                    type: "warning",
                                                    title: "Error",
                                                    text: res.message,
                                                    showConfirmButton: false,
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

                                } else {
                                    $(".overlay").hide();
                                    swal({
                                        type: "warning",
                                        title: "Error",
                                        text: res.message,
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
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
                            }
                        })
                      } catch (err) {
                            $(".overlay").hide();
                            swal({
                                type: "warning",
                                title: "Error",
                                text: res.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                      }
                  }else{
                        $('.overlay').hide()
                        swal({
                            type: "warning",
                            title: "Warning",
                            text: "Data Barang kosong, Mohon di isi",
                            showConfirmButton: false,
                            timer: 2000
                        });
                  }
                }
            })

        })
     })
   </script>
@endsection