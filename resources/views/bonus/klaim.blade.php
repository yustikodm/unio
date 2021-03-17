@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Klaim Bonus</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-4">
                        <h3><i class="fa fa-fw fa-money"></i>Rp. {{ (!empty($bonus)) ? number_format($bonus->bonus) : '0' }}</h3>                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Klaim Bonus</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    Rp.
                                </span>
                                <input type="text" placeholder="Masukan Nilai untuk di klaim" class="form-control" id="inputBonus" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat" id="klaim">Klaim</button>
                                </span>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>   
    @if(!empty($bonus))
        <script>
            $(document).ready(function(){
                $(function(){
                    var bonus = parseInt("{{ $bonus->bonus }}")
                    var bonusId = "{{ $bonus->id }}"

                    $("#inputBonus").keyup(function(){
                        $(this).val(formatRupiah(this.value))
                        if(parseInt($(this).val().replace(/[^,\d]/g, "")) >= bonus){
                            $(this).val(formatRupiah(bonus))
                        }else if(parseInt($(this).val().replace(/[^,\d]/g, "")) <= 0){
                            this.value = 0
                        }                        
                    })

                    $("#klaim").click(function(){
                        var value = parseInt($("#inputBonus").val().replace(/[^,\d]/g, ""));
                        if(value != 0 || value != '' || value != ' '){
                            swal({
                                title: "Apakah Anda Yakin?",
                                text: "Untuk Mengambil Bonus Sebesar Rp."+value,
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#39b55a",
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true
                            }, function(){                                        
                                var dataLog = {                                    
                                    mitra_id : "{{ $bonus->mitra_id }}",
                                    keterangan: "Klaim Bonus",
                                    jumlah: value
                                }
                                var data = {                                                                        
                                    bonus: bonus - value
                                }

                                $.ajax({
                                    url: apiUrl+'bonus/'+bonusId, 
                                    data: data,
                                    type: "PATCH",
                                    success: function(res){
                                        if(res.success){
                                            $.post(apiUrl+'log_klaim_bonus', dataLog, function(res){
                                                if(res.success){
                                                    setTimeout(function () {
                                                        swal("Berhasil!", "Berhasil Mengklaim Bonus!", "success");
                                                        location.reload();
                                                    }, 2000);                        
                                                }else{
                                                    swal("Gagal!", res.message, "warning");
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
                                            swal("Gagal!", res.message, "warning");
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

                            });                            
                        }
                    })
                })
            })
        </script> 
    @endif
@endsection

