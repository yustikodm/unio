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
                   {!! Form::model($purchaseOrder, ['route' => ['purchaseOrder.update', $purchaseOrder->id], 'method' => 'patch', 'id' => 'formEditPurchaseOrder']) !!}

                        @include('purchase_order.fields')
                        @include('purchase_order.blistedit')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnEditPurchaseOrder']) !!}
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
            var idpoedit = '{{ $purchaseOrder->id }}';
            var dataBarang = []

            let noListBarangAdd = 0;
            
            $(".btnaddb").click(function() {
                $(".overlay").show();
                let value = $(".blistpo").val();
                let namaBarang = $(".blistpo option:selected").html();
                // let idBarang = $("[data-barang='']").html();
                try {
                    if (value !== '' || !field.value.trim()) {
                        let harga = ''
                        let stok = ''
                        let success = ''
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
                                                    let inar = dataBarang.length;
                                                    if (index === -1) {
                                                         $(".box-barang").append(`
                                                                <tr data-barang="` + inar + `">
                                                                    <td scope="col">#</td>
                                                                    <td scope="col">` + namaBarang + `</td>
                                                                    <td scope="col">` + formatRupiah(harga.harga, "Rp. ") + `</td>
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
                                                        dataBarang[inar] = {
                                                                'id': inar,
                                                                'barang_id': value,
                                                                "jumlah": 1
                                                            }
                                                            // noListBarangAdd++
                                                    } else {
                                                        dataBarang[index].jumlah = dataBarang[index].jumlah + 1
                                                        $(".sb-" + dataBarang[index].id).val(dataBarang[index].jumlah)
                                                    }
                                                } else {
                                                    $(".box-barang").append(`
                                                        <tr data-barang="` + noListBarangAdd + `">
                                                            <td scope="col">#</td>
                                                            <td scope="col">` + namaBarang + `</td>
                                                            <td scope="col"> ` + formatRupiah(harga.harga, "Rp. ") + `</td>
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

                                                    let id = parseInt($(this).attr('data-id'));
                                                    for (var i = 0; i < dataBarang.length; i++) {
                                                        if (dataBarang[i].id === id) {
                                                            dataBarang.splice(i, 1);
                                                        }
                                                    }
                                                    $("[data-barang='" + id + "']").remove()
                                                })

                                                $(".inpsb").change(function() {
                                                    let id = parseInt($(this).attr('data-id'));
                                                    let stok = $("[data-barang='" + id + "'] [data-stok='" + id + "']").html()
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
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                });
                                            }
                                        } else {
                                            swal({
                                                type: "warning",
                                                title: "Error",
                                                text: res.message,
                                                showConfirmButton: false,
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
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    $(".overlay").hide();
                                }
                            } else {
                                swal({
                                    type: "warning",
                                    title: "Error",
                                    text: res.message,
                                    showConfirmButton: false,
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
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $(".overlay").hide();
                }
            })

            $(".btndelbarang").click(function() {

                let id = parseInt($(this).attr('data-id'));
                for (var i = 0; i < dataBarang.length; i++) {
                    if (dataBarang[i].id === id) {
                        dataBarang.splice(i, 1);
                    }
                }
                $("[data-barang='" + id + "']").remove()
            })

            $(".inpsb").change(function() {
                let id = parseInt($(this).attr('data-id'));
                let stok = $("[data-barang='" + id + "'] [data-stok='" + id + "']").html()
                for (var i = 0; i < dataBarang.length; i++) {
                    if (dataBarang[i].id === id) {

                        if ($(this).val() === '' || !$(this).val().trim()) {
                            dataBarang[i].jumlah = 1
                            $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                        } else {
                            dataBarang[i].jumlah = parseInt($(this).val())
                            $(".sb-" + dataBarang[i].id).val(dataBarang[i].jumlah)
                        }

                    }
                }
            })

            $.get(apiUrl + 'detail_purchase_order', function(res) {
              if (res.success) {
                  res.data.find(function(el) {
                      if (el.purchase_order_id == idpoedit) {
                          dataBarang.push({
                              id: el.id,
                              barang_id: el.barang_id,
                              jumlah: el.jumlah
                          })
                      }
                  })
              }
            }).done(function(msg){}).fail(function(xhr, status, error){
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
            
            $("#formEditPurchaseOrder #btnEditPurchaseOrder").click(function(e) {
              $(".overlay").show();
              e.preventDefault();
              // console.log(idpoedit)
              var values = {};
              $.each($('#formEditPurchaseOrder').serializeArray(), function(i, field) {
                  if (field.value === '' || !field.value.trim()) {
                      swal({
                          type: "warning",
                          title: "Error",
                          text: field.name.toUpperCase() + " kosong, Mohon di isi",
                          showConfirmButton: false,
                          timer: 2000
                      });
                      $(".overlay").hide();
                      return false;
                  } else {
                      values[field.name] = field.value;
                  }
              });            

              if (Object.keys(values).length === 5) {
                  if(dataBarang.length !=  0){
                    try {
                      // console.log(dataBarang)                 
                      $.ajax({
                          url: apiUrl + 'purchase_order/' + idpoedit,
                          type: values._method,
                          data: values,
                          success: function(resu) {
                              if (resu.success) {
                                  $.get(apiUrl + 'destroyByPoId/' + idpoedit, function(delres) {
                                      if (delres.success) {
                                              for (var i = 0; i < dataBarang.length; i++) {
                                                  var detailpo = {
                                                      _token: values._token,
                                                      purchase_order_id: idpoedit,
                                                      barang_id: dataBarang[i].barang_id,
                                                      jumlah: dataBarang[i].jumlah,
                                                      jumlah_kurang: dataBarang[i].jumlah
                                                  }

                                                  $.post(apiUrl + 'detail_purchase_order', detailpo, function(result) {
                                                      if (!result.success) {
                                                          $(".overlay").hide();
                                                          swal({
                                                              type: "warning",
                                                              title: "Error",
                                                              text: result.message,
                                                              showConfirmButton: false,
                                                              timer: 2000
                                                          });
                                                          return false;
                                                          location.reload()
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

                                                  if (i == (dataBarang.length - 1)) {
                                                      $(".overlay").hide();
                                                      swal({
                                                          type: "success",
                                                          title: "Sucess",
                                                          text: dataBarang.message,
                                                          showConfirmButton: false,
                                                          timer: 2000
                                                      });
                                                      window.location.href = baseUrl+"purchaseOrder"
                                                  }
                                              }                                    
                                      } else {
                                          $(".overlay").show();
                                          swal({
                                              type: "warning",
                                              title: "Error",
                                              text: delres.message,
                                              showConfirmButton: false,
                                              timer: 2000
                                          });
                                          // location.reload()
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
                                  $(".overlay").show();
                                  swal({
                                      type: "warning",
                                      title: "Error",
                                      text: resu.message,
                                      showConfirmButton: false,
                                      timer: 2000
                                  });
                                  location.reload()
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
                    } catch (err) {
                          $(".overlay").show();
                          swal({
                              type: "warning",
                              title: "Error",
                              text: err,
                              showConfirmButton: false,
                              timer: 2000
                          });
                          location.reload()
                    }
                  }else{
                    swal({
                          type: "warning",
                          title: "Error",
                          text: "Data kosong, Mohon tambah kan barang",
                          showConfirmButton: false,
                          timer: 2000
                      });
                      $(".overlay").hide();
                  }
              }
            })
        })
      })
   </script>
@endsection