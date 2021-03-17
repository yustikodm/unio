@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Retur Barang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    <div class="overlay" style="display: none;position: fixed;z-index: 999;top: 50%;left: 50%;">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                   {!! Form::model($returBarang, ['route' => ['returBarang.update', $returBarang->id], 'method' => 'patch', 'id' => 'formReturBarang']) !!}

                        @include('retur_barang.fields')

                         @include('retur_barang.blistedit')

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('returBarang.index') }}" class="btn btn-default">Cancel</a>
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

                var idrbedit = '{{ $returBarang->id }}';

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
                                                    if (dataBarang.length != 0) {
                                                        const index = dataBarang.findIndex(barang => barang.barang_id == value)
                                                        var cekIndex = dataBarang.findIndex(barang => barang.id == dataBarang.length);
                                                        if(cekIndex === -1){
                                                            var inar = dataBarang.length
                                                        }else{
                                                            var inar = dataBarang[cekIndex].id + 1;
                                                        }
                                                        if (index === -1) {
                                                            $(".box-barang").append(`
                                                                <tr data-barang="` + inar + `">
                                                                    <td scope="col">#</td>
                                                                    <td scope="col">` + namaBarang + `</td>
                                                                    <td scope="col">` + formatRupiah(harga.harga.toString(), "Rp. ") + `</td>
                                                                    <td scope="col" data-stok="` + inar + `">` + stok.stok + `</td>
                                                                    <td>
                                                                        <input type="text" class="form-control keterangan" data-id="` + inar + `">
                                                                    </td>
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
                                                                    'keterangan' : '',
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
                                                            <td scope="col"> ` + formatRupiah(harga.harga.toString(), "Rp. ") + `</td>
                                                            <td scope="col" data-stok="` + noListBarangAdd + `">` + stok.stok + `</td>
                                                            <td>
                                                                <input type="text" class="form-control keterangan" data-id="` + noListBarangAdd + `">
                                                            </td>
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
                                                            'keterangan' : '',
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

                                                    $(".btnketerangan").click(function(){
                                                        var id = parseInt($(this).attr('data-id'));
                                                        swal({
                                                          title: "Keterangan!",
                                                          text: "Tulis Sesuatu:",
                                                          type: "input",
                                                          showCancelButton: true,
                                                          closeOnClickOutside: false,
                                                          closeOnConfirm: true,
                                                          animation: "slide-from-top",
                                                          inputPlaceholder: "Tulis Sesuatu",
                                                        },
                                                        function(inputValue){
                                                          if (inputValue === false) return false;

                                                          if (inputValue === "") {
                                                            swal.showInputError("You need to write something!");
                                                            return false
                                                          }
                                                            for (var i = 0; i < dataBarang.length; i++) {
                                                                if (dataBarang[i].id === id) {
                                                                    dataBarang[i].keterangan = inputValue;
                                                                }
                                                            }
                                                        });
                                                    })

                                                    $(".keterangan").change(function(){
                                                        var id = parseInt($(this).attr('data-id'));
                                                        var value = this.value;
                                                        for (var i = 0; i < dataBarang.length; i++) {
                                                            if (dataBarang[i].id === id) {
                                                                dataBarang[i].keterangan = value;
                                                            }
                                                        }

                                                    })

                                                    $(".inpsb").change(function() {
                                                        var id = parseInt($(this).attr('data-id'));
                                                        var stok = parseInt($("[data-barang='" + id + "'] [data-stok='" + id + "']").html())
                                                        for (var i = 0; i < dataBarang.length; i++) {
                                                            if (dataBarang[i].id === id) {
                                                                if(this.value >= stok){
                                                                    dataBarang[i].jumlah = stok
                                                                    $(".sb-" + dataBarang[i].id).val(stok)
                                                                }else if(this.value <= stok){
                                                                    if ($(this).val() === '' || !$(this).val().trim()) {
                                                                        dataBarang[i].jumlah = 1
                                                                        $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                                                                    }
                                                                    else {
                                                                        dataBarang[i].jumlah = parseInt($(this).val())
                                                                        $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                                                                    }
                                                                }else if($(this).val() === '' || !$(this).val().trim()){
                                                                    dataBarang[i].jumlah = 1
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
                    var stok = parseInt($("[data-barang='" + id + "'] [data-stok='" + id + "']").html())
                    for (var i = 0; i < dataBarang.length; i++) {
                        if (dataBarang[i].id === id) {
                            if(this.value >= stok){
                                dataBarang[i].jumlah = stok
                                $(".sb-" + dataBarang[i].id).val(stok)
                            }else if(this.value <= stok){
                                if ($(this).val() === '' || !$(this).val().trim()) {
                                    dataBarang[i].jumlah = 1
                                    $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                                }
                                else {
                                    dataBarang[i].jumlah = parseInt($(this).val())
                                    $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                                }
                            }else if($(this).val() === '' || !$(this).val().trim()){
                                dataBarang[i].jumlah = 1
                                $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                            }

                        }
                    }
                })

                $(".keterangan").change(function(){
                    var id = parseInt($(this).attr('data-id'));
                    var value = this.value;
                    for (var i = 0; i < dataBarang.length; i++) {
                        if (dataBarang[i].id === id) {
                            dataBarang[i].keterangan = value;
                        }
                    }

                })

                $.get(apiUrl + 'barang_retur', function(res) {
                  if (res.success) {
                      res.data.find(function(el) {
                          if (el.retur_barang_id == idrbedit) {
                              dataBarang.push({
                                  id: el.id,
                                  barang_id: el.barang_id,
                                  keterangan: el.keterangan,
                                  jumlah: el.jumlah
                              })
                          }
                      })
                      console.log(dataBarang);
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

                $("#formReturBarang").submit(function(e){
                    e.preventDefault();

                    var values = {};

                    $.each($('#formReturBarang').serializeArray(), function(i, field) {
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

                    // console.log(Object.keys(values).length)
                    // console.log(dataBarang);

                    if (Object.keys(values).length === 5) {
                        if(dataBarang.length != 0 ){
                            $(".overlay").show();
                            $.ajax({
                                url: apiUrl + 'retur_barang/'+idrbedit,
                                type: values._method,
                                data: values,
                                success: function(res){
                                     if (res.success) {
                                            $.get(apiUrl+'deleteBarangRetur/'+idrbedit, function(dbr){
                                                if(dbr.success){
                                                    var resrb = res.data
                                                    for (var i = 0; i < dataBarang.length; i++) {
                                                        var baranr = {
                                                            _token: values._token,
                                                            retur_barang_id: resrb.id,
                                                            barang_id: dataBarang[i].barang_id,
                                                            keterangan: dataBarang[i].keterangan,
                                                            jumlah: dataBarang[i].jumlah,
                                                            jumlah_kurang: dataBarang[i].jumlah
                                                        }

                                                        $.post(apiUrl + 'barang_retur', baranr).done(function(e) {
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

                                                        if (i == (dataBarang.length - 1)) {
                                                            $(".overlay").hide();
                                                            swal({
                                                                type: "success",
                                                                title: "Succcess",
                                                                text: res.message,
                                                                showConfirmButton: true,
                                                                timer: 2000
                                                            });
                                                            window.location.href = baseUrl+'returBarang'
                                                        }

                                                    }
                                                }else{
                                                    $(".overlay").hide();
                                                    swal({
                                                        type: "warning",
                                                        title: "Error",
                                                        text: dbr.message,
                                                        showConfirmButton: true,
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
                                                showConfirmButton: true,
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
