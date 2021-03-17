@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kirim Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kirimBarang, ['route' => ['kirimBarang.update', $kirimBarang->id], 'method' => 'patch', 'id' => 'formEditKirimBarang']) !!}

                        @include('kirim_barang.fields')

                        @include('kirim_barang.blistedit')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnEditKirimBarang']) !!}
                            <a href="{{ route('kirimBarang.index') }}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>

   <script type="text/javascript">
     $(document).ready(function(){
      $(function(){        
        var kirimid = "{{ $kirimBarang->id }}";
        var dpoid = "{{ $kirimBarang->purchase_order_id }}";
        var dataBarang = []
        var dataBarangKirim = []

        $.get(apiUrl + 'getDetailPurchaseOrder/' + dpoid, function(res) {
                dataBarang = res.data
                $.get(apiUrl + "getBarangKirim/" + kirimid, function(has) {
                    has.barangKirim.forEach(function(resu) {
                        dataBarangKirim.push({
                            id: resu.id,
                            barang_id: resu.barang_id,
                            jumlah: resu.jumlah,
                            jumlah_kurang: resu.jumlah_kurang,
                            harga: resu.harga
                        });
                    })
                    // console.log(dataBarang)
                    // console.log(dataBarangKirim)
                }).done(function(msg){}).fail(function(xhr, status, error) {
                    var err = JSON.parse(xhr.responseText).errors
                    $('.overlay').hide()
                    if(err === undefined){
                        swal({
                            type: "warning",
                            title: "Warning",
                            text: JSON.parse(xhr.responseText).message,
                            showConfirmButton: true,
                            timer: 3000
                        });    
                    }else{
                        for (const property in err) {
                            swal({
                                type: "warning",
                                title: "Warning",
                                text: `${property}: ${err[property]}`,
                                showConfirmButton: true,
                                timer: 3000
                            });
                        }     
                    }                     
                });
        }).done(function(msg){}).fail(function(xhr, status, error) {
           var err = JSON.parse(xhr.responseText).errors
            $('.overlay').hide()
            if(err === undefined){
                swal({
                    type: "warning",
                    title: "Warning",
                    text: JSON.parse(xhr.responseText).message,
                    showConfirmButton: true,
                    timer: 3000
                });    
            }else{
                for (const property in err) {
                    swal({
                        type: "warning",
                        title: "Warning",
                        text: `${property}: ${err[property]}`,
                        showConfirmButton: true,
                        timer: 3000
                    });
                }     
            }                
        });       

        $(".checkBarangAll").change(function() {                    
            // console.log('oke')
            if ($(this).prop('checked') == true) {
                $(".checkBarang").prop('checked', true)
                dataBarangKirim = []
                for (let i = 0; i < dataBarang.length; i++) {
                    $("input[type=number][data-id="+dataBarang[i].id+"]").attr('disabled', false) 
                    dataBarangKirim.push({
                        id: dataBarang[i].id,
                        barang_id: dataBarang[i].barang_id,
                        jumlah: dataBarang[i].jumlah,
                        jumlah_kurang: dataBarang[i].jumlah,
                        harga: dataBarang[i].harga
                    })
                }
                let hargab = 0
                let jumlahb = 0
                for (var i = 0; i < dataBarangKirim.length; i++) {
                    jumlahb = dataBarangKirim[i].jumlah + jumlahb
                    hargab = dataBarangKirim[i].jumlah * dataBarangKirim[i].harga + hargab
                }
                $(".totalharga").html(formatRupiah('"'+hargab+'"', 'Rp. '))
                $(".totaljumlah").html(jumlahb)
                // console.log(dataBarang)
                // console.log(dataBarangKirim)
            } else {
                 for (let i = 0; i < dataBarang.length; i++) {
                    $("input[type=number][data-id="+dataBarang[i].id+"]").attr('disabled', true)                           
                }
                $(".checkBarang").prop('checked', false)
                dataBarangKirim = []
                $(".totalharga").html('')
                $(".totaljumlah").html('')
            }
        })

        $(".checkBarang").change(function() {                                      
            if ($(this).prop('checked') == true) {
                var barangRow = dataBarang.find(({ barang_id }) => {
                    return barang_id == $(this).attr('data-id')
                })
                // console.log(barangRow)
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
            // console.log(dataBarangKirim)         
        })

        $(".jumlahKirimBarang").change(function(){       
            var idbarang = $(this).attr('data-id')
            var barangRow = dataBarangKirim.find(({ barang_id }) => {
                return barang_id == idbarang
            })
            var barangDPO = dataBarang.find(({ barang_id }) => {
                return barang_id == idbarang
            })
            console.log(barangRow)
            if(this.value != ''){
                if(parseInt(this.value) > barangDPO.jumlah){                    
                    barangRow.jumlah_kurang = barangDPO.jumlah  
                    this.value = barangDPO.jumlah   
                    $('.checkBarang-'+idbarang).html(0)                                                                        
                }else{
                    barangRow.jumlah_kurang =  parseInt(this.value)                                                                      
                    $('.checkBarang-'+idbarang).html(barangRow.jumlah - parseInt(this.value))
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

        $("#formEditKirimBarang #btnEditKirimBarang").click(function(e) {

            $(".overlay").show();

            e.preventDefault();

            // console.log(dataBarangKirim)

            var values = {};

            $.each($('#formEditKirimBarang').serializeArray(), function(i, field) {
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

            // delete values._method    

            // console.log(values)
            // console.log(dataBarangKirim)
            // console.log(Object.keys(values).length)

            if (Object.keys(values).length === 4) {
                try {
                    if (dataBarangKirim.length != 0) {
                        $.ajax({
                            url: apiUrl + 'kirim_barang/' + kirimid,
                            data: values,
                            type: values._method,
                            success: function(coba) {
                                // console.log(coba)
                                if (coba.success) {
                                    let reskb = coba.data

                                    $.get(apiUrl + 'deleteBarangKirim/' + kirimid, function(res) {
                                        if (res.success) {                                          
                                                for (let i = 0; i < dataBarangKirim.length; i++) {
                                                    let detailkb = {
                                                        _token: values._token,
                                                        // purchase_order_id : reskb.purchase_order_id,
                                                        kirim_barang_id: reskb.id,
                                                        barang_id: dataBarangKirim[i].barang_id,
                                                        jumlah: dataBarangKirim[i].jumlah_kurang,
                                                        jumlah_kurang: dataBarangKirim[i].jumlah_kurang,
                                                        jumlah_dpo: dataBarangKirim[i].jumlah,
                                                    }
                                                    $.post(apiUrl + 'barang_kirim', detailkb).done(function(e) {
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
                                                        var err = JSON.parse(xhr.responseText).errors
                                                        $('.overlay').hide()
                                                        if(err === undefined){
                                                            swal({
                                                                type: "warning",
                                                                title: "Warning",
                                                                text: JSON.parse(xhr.responseText).message,
                                                                showConfirmButton: true,
                                                                timer: 3000
                                                            });    
                                                        }else{
                                                            for (const property in err) {
                                                                swal({
                                                                    type: "warning",
                                                                    title: "Warning",
                                                                    text: `${property}: ${err[property]}`,
                                                                    showConfirmButton: true,
                                                                    timer: 3000
                                                                });
                                                            }     
                                                        }             
                                                    });                                                
                                                    if (i == (dataBarangKirim.length - 1)) { 
                                                        $.get(apiUrl+'checkBarangDPO/'+ reskb.id, function(bdpo){
                                                            if(bdpo.success){
                                                              $(".overlay").hide();
                                                              swal({
                                                                  type: "success",
                                                                  title: "Succcess",
                                                                  text: coba.message,
                                                                  showConfirmButton: false,
                                                                  timer: 2000
                                                              });
                                                              window.location.href = baseUrl+'kirimBarang'
                                                            }else{
                                                                $(".overlay").hide();
                                                                swal({
                                                                    type: "warning",
                                                                    title: "Error",
                                                                    text: bdpo.message,
                                                                    showConfirmButton: false,
                                                                    timer: 2000
                                                                });
                                                            }
                                                        })                                                                                                      
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
                                       var err = JSON.parse(xhr.responseText).errors
                                        $('.overlay').hide()
                                        if(err === undefined){
                                            swal({
                                                type: "warning",
                                                title: "Warning",
                                                text: JSON.parse(xhr.responseText).message,
                                                showConfirmButton: true,
                                                timer: 3000
                                            });    
                                        }else{
                                            for (const property in err) {
                                                swal({
                                                    type: "warning",
                                                    title: "Warning",
                                                    text: `${property}: ${err[property]}`,
                                                    showConfirmButton: true,
                                                    timer: 3000
                                                });
                                            }     
                                        }                        
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
                                if(err === undefined){
                                    swal({
                                        type: "warning",
                                        title: "Warning",
                                        text: JSON.parse(xhr.responseText).message,
                                        showConfirmButton: true,
                                        timer: 3000
                                    });    
                                }else{
                                    for (const property in err) {
                                        swal({
                                            type: "warning",
                                            title: "Warning",
                                            text: `${property}: ${err[property]}`,
                                            showConfirmButton: true,
                                            timer: 3000
                                        });
                                    }     
                                }
                            }
                          })
                    } else {
                          $(".overlay").hide();
                          swal({
                              type: "warning",
                              title: "Error",
                              text: "Data Barang Kosong, Mohon di Isi",
                              showConfirmButton: false,
                              timer: 2000
                          });
                      }
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

            }
        })
      })
     })
   </script>
@endsection