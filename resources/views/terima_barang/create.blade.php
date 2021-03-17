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
                    {!! Form::open(['route' => 'terimaBarang.store', 'id' => 'formAdddTerimabarang']) !!}

                        @include('terima_barang.fields')

                        @include('terima_barang.blist')

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnAddTerimabarang']) !!}
                            <a href="{{ route('terimaBarang.index') }}" class="btn btn-default">Cancel</a>
                        </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var  dataBarang = []
        var  dataBarangKirim = []
        var tb_kb = $("#tb_kb").val();

        if (tb_kb != '') {
            $(".overlay").show();
            $('.blistkb').html('')
            $.get(apiUrl + "kirim_barang/" + tb_kb, function(res) {
                if (res.success) {
                    // console.log(res.data)
                    var data = res.data.kirimBarang;
                    $("#tb_ns").val(data.supplier_id)
                    $("#tb_np").val(data.pegawai_id)
                    $("#tb_po").val(data.purchase_order_id)                    
                    $("#tb_kode").val("TB0" + makeid(5))
                    if (res.data.barangKirim.length != 0) {
                        $(".overlay").hide();
                        var no = 1
                        res.data.barangKirim.forEach(function(row) {
                            dataBarang.push({
                                id: row.id,
                                barang_id: row.barang_id,
                                jumlah_kurang: row.jumlah_kurang,
                                jumlah: row.jumlah_kurang,
                                harga: row.harga
                            })
                            $('.blistkb').append(`
                                <tr>
                                    <td scope="col">` + no++ + `</td>
                                    <td scope="col">` + row.nama + `</td>
                                    <td scope="col">` + formatRupiah(row.harga, "Rp. ") + `</td>
                                    <td scope="col">` + row.jumlah_kurang + `</td>
                                    <td scope="col"> <input type="number" min="1" style="width: 90px;" disabled class="form-control jumlahKirimBarang text-center input" data-id="` + row.id + `" value="`+row.jumlah_kurang+`"> </td>
                                    <td scope="col" class="checkBarang-` + row.id + `" ></td>
                                    <td scope="col"> <input type="checkbox" class = "checkBarang" data-id="` + row.id + `"></td>
                                  </tr>   
                            `)
                                // hargab = hargab + row.harga * row.jumlah
                                // jumlahb = jumlahb + row.jumlah
                        })
                       $('.blistkb').append(`
                                <tr>
                                <th scope="col" colspan="3" style = "text-align: right;"> Total: </th><td scope = "col" class="totaljumlah"></td>
                                <td scope="col"class="totalharga"></td>
                                </tr>
                            `)

                        $(".checkBarang").change(function() {
                             if ($(this).prop('checked') == true) {
                                    var barangRow = dataBarang.find(({ id }) => {
                                        return id == $(this).attr('data-id')
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
                                    $("input[type=number][data-id="+idDO+"]").attr('disabled', true)    
                                    for (var i = 0; i < dataBarangKirim.length; i++) {
                                        if (dataBarangKirim[i].id === idDO) {
                                            $('.checkBarang-'+idDO).html('')
                                            $("input[type=number][data-id="+idDO+"]").val(dataBarangKirim[i].jumlah)
                                            // console.log(dataBarangKirim[i])
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
                            var barangRow = dataBarangKirim.find(({ id }) => {
                                return id == idbarang
                            })
                            if(this.value != ''){
                                if(parseInt(this.value) > barangRow.jumlah){
                                    barangRow.jumlah_kurang = barangRow.jumlah  
                                    this.value = barangRow.jumlah                                                                        
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

                    } else {
                        $(".overlay").hide();
                        $('.blistkb').append(`
                            <tr>
                                <th scope="row" colspan="6">Tidak Ada Barang</th>
                              </tr>
                        `)
                    }
                } else {
                    $(".overlay").hide();
                    swal({
                        type: "warning",
                        title: "Error",
                        text: "Something error please try again",
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
        }else{            
            $('.blistkb').html(`
                <tr>
                    <th scope="row" colspan="6">Tidak Ada Barang</th>
                </tr>`)
        }   

        $("#tb_kb").change(function() {
             $(".overlay").show();
             $('.blistkb').html(`
                <tr>
                  <th scope="row" colspan="5">Tidak Ada Barang</th>
                </tr>
              `)
              dataBarangKirim = []
              dataBarang = [] 

            $.get(apiUrl + "kirim_barang/" + this.value, function(res) {
              if (res.success) {
                  var data = res.data.kirimBarang
                  $("#tb_ns").val(data.supplier_id)
                  $("#tb_np").val(data.pegawai_id)
                  $("#tb_po").val(data.purchase_order_id)
                  if ($("#tb_kode").val() == '') {
                      $("#tb_kode").val("TB0" + makeid(5))
                  }
                  $('.blistkb').html('')
                  if (res.data.barangKirim.length != 0) {
                      $(".overlay").hide();
                      var no = 1
                      res.data.barangKirim.forEach(function(row) {
                            dataBarang.push({
                                id: row.id,
                                barang_id: row.barang_id,
                                jumlah_kurang: row.jumlah_kurang,
                                jumlah: row.jumlah_kurang,
                                harga: row.harga
                            })
                          $('.blistkb').append(`
                                 <tr>
                                    <td scope="col">` + no++ + `</td>
                                    <td scope="col">` + row.nama + `</td>
                                    <td scope="col">` + formatRupiah(row.harga,"Rp. ") + `</td>
                                    <td scope="col">` + row.jumlah_kurang + `</td>
                                    <td scope="col"> <input type="number" min="1" style="width: 90px;" disabled class="form-control jumlahKirimBarang text-center input" data-id="` + row.id + `" value="`+row.jumlah_kurang+`"> </td>
                                    <td scope="col" class="checkBarang-` + row.id + `" ></td>
                                    <td scope="col"> <input type="checkbox" class = "checkBarang" data-id="` + row.id + `"></td>
                                 </tr>       
                            `)
                          // hargab = hargab + row.harga * row.jumlah
                          // jumlahb = jumlahb + row.jumlah
                      })
                      $('.blistkb').append(`
                        <tr>                      
                          <th scope="col" colspan="3" style="text-align: right;">Total :</th>
                          <td scope="col" class="totaljumlah"></td>
                          <td scope="col" class="totalharga"></td>
                        </tr>
                      `)

                        $(".checkBarang").change(function() {
                             if ($(this).prop('checked') == true) {
                                    var barangRow = dataBarang.find(({ id }) => {
                                        return id == $(this).attr('data-id')
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
                                    $("input[type=number][data-id="+idDO+"]").attr('disabled', true)    
                                    for (var i = 0; i < dataBarangKirim.length; i++) {
                                        if (dataBarangKirim[i].id === idDO) {
                                            $("input[type=number][data-id="+idDO+"]").val(dataBarangKirim[i].jumlah)
                                            $('.checkBarang-'+idDO).html('')
                                            // console.log(dataBarangKirim[i])
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
                            var barangRow = dataBarangKirim.find(({ id }) => {
                                return id == idbarang
                            })
                            if(this.value != ''){
                                if(parseInt(this.value) > barangRow.jumlah){
                                    barangRow.jumlah_kurang = barangRow.jumlah  
                                    this.value = barangRow.jumlah                                                                        
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
                  } else {
                      $(".overlay").hide();
                      $('.blistkb').append(`
                        <tr>
                            <th scope="row" colspan="6">Tidak Ada Barang</th>
                        </tr>
                        `)    
                  }
              } else {
                  $(".overlay").hide();
                  swal({
                      type: "warning",
                      title: "Error",
                      text: "Something error please try again",
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
        })

        $(".checkBarangAll").change(function() {                               
            if ($(this).prop('checked') == true) {
                $(".checkBarang").prop('checked', true)
                dataBarangKirim = []
                for (var i = 0; i < dataBarang.length; i++) {
                    $("input[type=number][data-id="+dataBarang[i].id+"]").attr('disabled', false) 
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
                    $("input[type=number][data-id="+dataBarang[i].id+"]").attr('disabled', true)  
                    $("input[type=number][data-id="+dataBarang[i].id+"]").val(dataBarang[i].jumlah)
                    $('.checkBarang-'+dataBarang[i].id).html('')                             
                }
                $(".checkBarang").prop('checked', false)
                dataBarangKirim = []
                $(".totalharga").html('')
                $(".totaljumlah").html('')
            }
        })

        $("#formAdddTerimabarang #btnAddTerimabarang").click(function(e) {
            try{
                $(".overlay").show();

            e.preventDefault();

            // console.log(dataBarangKirim)

            var values = {};

            $.each($('#formAdddTerimabarang').serializeArray(), function(i, field) {
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

            // console.log(values)
            // console.log(Object.keys(values).length)

            if (Object.keys(values).length === 6) {
                if(dataBarangKirim.length != 0){
                    $.post(apiUrl + 'terima_barang', values, function(res) {
                    if (res.success) {
                        var reskb = res.data
                        for (var i = 0; i < dataBarangKirim.length; i++) {
                            var detailtb = {
                                _token: values._token,                             
                                terima_barang_id: reskb.id,
                                barang_id: dataBarangKirim[i].barang_id,
                                jumlah: dataBarangKirim[i].jumlah_kurang,
                                jumlah_kurang: dataBarangKirim[i].jumlah_kurang,
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

                               swal({
                                   type: "success",
                                   title: "Succcess",
                                   text: res.message,
                                   showConfirmButton: false,
                                   timer: 2000
                                });
                               window.location.href = baseUrl+'terimaBarang'
                               $(".overlay").hide();
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
            }catch(err){
                $('.overlay').hide()
                swal({
                    type: "warning",
                    title: "Warning",
                    text: err,
                    showConfirmButton: false,
                    timer: 2000
                });
            }            
        })       
    </script>
@endsection
