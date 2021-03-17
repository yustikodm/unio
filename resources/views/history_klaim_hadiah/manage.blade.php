@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Manajemen Klaim Hadiah</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-striped table-bordered dataTable no-footer" id="dataKlaimhadiah">
                    <thead>
                        <tr>
                            <th>Nama Mitra</th>
                            <!-- <th>Poin Mitra</th> -->
                            <th>Hadiah</th>
                            <th>Poin Hadiah</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->nama_mitra }}</td>
                                <!-- <td>{{ $row->poin_mitra }}</td> -->
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->poin_hadiah }}</td>
                                <td data-keterangan="{{ $row->id }}">{{ $row->keterangan }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <div class="btn-group box-btn-{{ $row->id }}">
                                        @if($row->status == 'Disetujui')
                                            <span class="badge bg-green">{{$row->status}}</span>
                                        @elseif($row->status == 'Ditolak')
                                            <span class="badge bg-red">{{$row->status}}</span>
                                        @else
                                            <button class="btn btn-xs btn-default btnProses" title="Proses" data-id="{{ $row->id }}" <?= ($row->status != 'Diajukan') ? 'disabled' : '' ?>>
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                            <button data-terima="{{ $row->id }}" title="Setujui" class="btn btnTerima btn-xs btn-success" <?= ($row->status == 'Diajukan') ? 'disabled' : '' ?>>
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button data-tolak="{{ $row->id }}" title="Tolak" class="btn btnTolak btn-xs btn-danger" <?= ($row->status == 'Diajukan') ? 'disabled' : '' ?>>
                                                <i class="fa fa-times"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
    <script>
        $("#dataKlaimhadiah").DataTable({
            "dom": '<"top pull-right"f>rt<"bottom pull-right"p><"clear">'
        })

        $("tbody").on('click', '.btnProses' ,function(e){
            var histori_id = $(this).attr('data-id')
            e.preventDefault();
            swal({
                title: "Apakah Anda Yakin?",
                text: "Untuk Memproses Klaim Hadiah ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(){
                var data = {
                    keterangan : "Diproses",
                    status : "Diproses"
                }
                $.ajax({
                    url:apiUrl+'history_klaim_hadiah/'+histori_id,
                    type: 'PATCH',
                    data: data,
                    success : function(res){
                        if(res.success){
                            setTimeout(() => {
                                swal("Berhasil!","Berhasil memproses klaim hadiah", "success")
                                $("[data-id='"+ histori_id +"']").attr("disabled", true);
                                $("[data-keterangan='"+ histori_id +"']").html("Diproses");
                                $("[data-terima='"+ histori_id +"']").attr("disabled", false);
                                $("[data-tolak='"+ histori_id +"']").attr("disabled", false);
                                window.location.reload();
                            }, 2000);
                        }else{
                            swal("Gagal!",res.message, "warning")
                        }
                    },
                    error : function(){

                    }
                })
            })
        })

        $("tbody").on('click', '.btnTerima' ,function(e){
            var histori_id = $(this).attr('data-terima')
            e.preventDefault();
            swal({
                title: "Apakah Anda Yakin?",
                text: "Untuk Mensetujui Klaim Hadiah ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Disetujui!",
                confirmButtonColor: "#00a65a",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(){
                $.post(apiUrl+'agreeReward/'+histori_id, function(res){
                    if(res.success){
                        setTimeout(() => {
                            swal("Berhasil!","Klaim hadiah berhasil disetujui", "success")
                            $("[data-keterangan='"+ histori_id +"']").html("Selamat Klaim Hadiah Anda Disetujui");
                            $('.box-btn-'+histori_id).html('<span class="badge bg-green">Disetujui</span>')
                        }, 2000);
                    }else{
                        swal("Gagal!",res.message, "warning")
                    }
                }).done(function(msg){}).fail(function(xhr, status, error) {
                   var err = JSON.parse(xhr.responseText).errors
                    if(err === undefined){
                        swal("Gagal!",JSON.parse(xhr.responseText).message, "warning")
                    }else{
                        for (const property in err) {
                            swal("Gagal!",`${property}: ${err[property]}`, "warning")
                        }
                    }
                });
            })
        })

        $("tbody").on('click', '.btnTolak' ,function(e){
            var histori_id = $(this).attr('data-tolak')
            e.preventDefault();
            swal({
                title: "Apakah Anda Yakin?",
                text: "Berikan keterangan kenapa klaim hadiah ditolak!",
                type: "input",
                showCancelButton: true,
                confirmButtonText: "Ditolak!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonColor: "#dd4b39",
                inputPlaceholder: "Tulis Sesuatu"
            }, function(input){
                if (input === false) return false;
                if (input === "") {
                    swal.showInputError("Anda harus mengisi keterangan!");
                    return false
                }
                var data = {
                    keterangan : input,
                    status : "Ditolak"
                }
                $.ajax({
                    url:apiUrl+'diclineReward/'+histori_id,
                    type: 'post',
                    data: data,
                    success : function(res){
                        console.log(res)
                        if(res.success){
                            setTimeout(() => {
                                swal("Berhasil!", "Berhasil menolak klaim hadiah", "success")
                                $("[data-keterangan='"+ histori_id +"']").html(input);
                                $('.box-btn-'+histori_id).html('<span class="badge bg-red">Ditolak</span>')
                            }, 2000);
                        }else{
                            swal("Gagal!",res.message, "warning")
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText).errors
                        if(err === undefined){
                            swal("Gagal!",JSON.parse(xhr.responseText).message, "warning")
                        }else{
                            for (const property in err) {
                                swal("Gagal!",`${property}: ${err[property]}`, "warning")
                            }
                        }
                    }
                })
            })
        })
    </script>
@endsection

