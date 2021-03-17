@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penerimaan Retur
        </h1>
    </section>
    {!! Form::open(['route' => 'penerimaanRetur.store']) !!}
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">                    
                    @include('penerimaan_retur.fields')                    
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h4>Barang Retur</h4>                        
            </div>   
            <div class="box-body">
                <div class="row">
                     <div class="col-md-12">
                        <div class="overlay" style="display: none; position: fixed; width: 67%; top: 300px;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                         <table class="table table-striped table-hover">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nama barang</th> 
                                     <th>Jumlah</th>
                                     <th>Keterangan</th>
                                     <th><input type="checkbox" id="terimaSemua">Terima Semua</th>                                     
                                 </tr>
                             </thead>
                             <tbody id="box_barang_penerimaan">
                                 
                             </tbody>
                         </table>
                     </div>  
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                     <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'btnAddPenerimaan']) !!}
                        <a href="{{ route('penerimaanRetur.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <script>        
        var retur_barang_id = $("#retur_barang_id").val()
        var dataBarang = []
        var dataBarangTerima = []
        $(".overlay").show();
        if(retur_barang_id != ''){
            $.get(apiUrl+'barang_retur', function(res){
                if(res.data.length != 0){                    
                    var i = 1;
                    res.data.filter(data => data.retur_barang_id == retur_barang_id).forEach(function(row){
                        dataBarang.push({ barang_id : row.barang_id, jumlah : row.jumlah, keterangan: row.keterangan })
                        $("#box_barang_penerimaan").append(`
                            <tr>
                                <td>`+ i++ +`</td>
                                <td>`+ row.nama +`</td> 
                                <td><input type="number" min="1" style="width: 90px;" class="form-control text-center inpsb " data-id="` + row.barang_id + `" value="`+ row.jumlah +`" disabled> </td>
                                <td class="keterangan" data-keterangan="`+row.keterangan+`">`+ row.keterangan.slice(0, 60)+"..." +`</td>
                                <td scope="col"> <input type="checkbox" class = "checkBarang" data-id="` + row.barang_id + `"></td>                                    
                            </tr>
                            `)
                    })
                    $(".overlay").hide();
                }
            })
        }else{
            $(".overlay").hide();
        }

        $("#retur_barang_id").change(function(){
            $(".overlay").show();
            $("#box_barang_penerimaan").html('')
            $("#terimaSemua").prop('checked', false)
            dataBarang = []
            dataBarangTerima = []
            var value = this.value;
            $.get(apiUrl+'barang_retur', function(res){
                if(res.data.length != 0){
                    var i = 1;
                    res.data.filter(data => data.retur_barang_id == value).forEach(function(row){
                        dataBarang.push({ barang_id : row.barang_id, jumlah : row.jumlah, keterangan: row.keterangan })
                        $("#box_barang_penerimaan").append(`
                            <tr>
                                <td>`+ i++ +`</td>
                                <td>`+ row.nama +`</td> 
                                <td scope="col">
                                    <input type="number" min="1" style="width: 90px;" class="form-control text-center inpsb " data-id="` + row.barang_id + `" value="`+ row.jumlah +`" disabled> 
                                </td>
                                <td class="keterangan" data-keterangan="`+row.keterangan+`">`+ row.keterangan.slice(0, 60)+"..." +`</td>
                                <td scope="col"> <input type="checkbox" class = "checkBarang" data-id="` + row.barang_id + `"></td> 
                            </tr>
                            `)
                    })
                    $(".overlay").hide();
                }
            })
        })
        
        $("tbody").on('click', '.keterangan', function () {
            swal({
                title: "Keterangan",
                text: ($(this).attr('data-keterangan').length == 0)? 'Kosong' : $(this).attr('data-keterangan')
            })
        }); 

        $("tbody").on('click', '.checkBarang', function () {
           if($(this).prop('checked')){
                var id = $(this).attr('data-id');
                var barang = dataBarang.find(({barang_id})=>{
                    return barang_id == id;
                })
                dataBarangTerima.push(barang)                
           }else{
                var id = $(this).attr('data-id');
                for (var i = 0; i < dataBarangTerima.length; i++) {
                    if (dataBarangTerima[i].barang_id == id) {                        
                        dataBarangTerima.splice(i, 1);
                    }
                }
           }
        });        

        $("#terimaSemua").change(function(){            
            if($(this).prop('checked')){
                $("tbody .checkBarang").prop('checked', true);
                dataBarangTerima = []
                dataBarangTerima = dataBarang 
           }else{
                $("tbody .checkBarang").prop('checked', false);
                dataBarangTerima = []
           }
        })

        $("#btnAddPenerimaan").click(function(e){
            e.preventDefault();                         
            var values = {};
            $.each($("#btnAddPenerimaan").parents('form').serializeArray(), function(i, field) {
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
            var keterangan = dataBarangTerima.find(({keterangan}) => {
                return keterangan == '';
            })
            // console.log(Object.keys(values).length)
            if(keterangan === undefined){
                if (Object.keys(values).length === 5) {
                    $(".overlay").show();
                    if (dataBarangTerima.length != 0) {
                        $.post(apiUrl + 'penerimaan_retur', values, function(res) {
                            if (res.success) {
                                let reskb = res.data                                  
                                for (let i = 0; i < dataBarangTerima.length; i++) {
                                    let detailkb = {
                                        _token: values._token,
                                        penerimaan_retur_id: reskb.id,
                                        barang_id: dataBarangTerima[i].barang_id,
                                        keterangan: dataBarangTerima[i].keterangan,
                                        jumlah: dataBarangTerima[i].jumlah,
                                        jumlah_kurang: dataBarangTerima[i].jumlah                                         
                                    }
                                    $.post(apiUrl + 'barang_penerimaan', detailkb, function(e) {
                                        if (!e.success) {
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
                                    if (i == (dataBarangTerima.length - 1)) {
                                        $(".overlay").hide();
                                        swal({
                                            type: "success",
                                            title: "Succcess",  
                                            text: res.message,
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                        window.location.href = baseUrl+'penerimaanRetur'
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
                        $(".overlay").hide();
                        swal({
                            type: "warning",
                            title: "Warning",
                            text: 'Data Barang Kosong',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }
            }else{
                $(".overlay").hide();
                swal({
                    type: "warning",
                    title: "Error",
                    text: "Ada keterangan kosong di barang",
                    showConfirmButton: true,
                    timer: 2000
                });
            }
        })                   
    </script>
@endsection
