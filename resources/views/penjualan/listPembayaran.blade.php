@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Data Tagihan</h1>
    </section>
    <div class="content">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table id="table" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Pelanggan</th>
                            <th>Ppn</th>
                            <th>Kode Voucher</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->kode}}</td>
                                <td>{{$row->pelanggan_nama}}</td>
                                <td>{{$row->ppn}} %</td>
                                <td>{{$row->kode_voucher}}</td>
                                <td>Rp. {{number_format($row->total)}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <a href="lanjutTransaksi\{{ $row->id }}" class="btn btn-success btn-sm">Lanjut Transaksi</a>
                                            <button class="btn btn-danger btn-sm btnBatal" data-id="{{ $row->id }}">Batalkan Transaksi</button>
                                        <!-- <a onclick="return confirm('Yakin Membatalkan Transaksi!')" href="batalTransaksi\{{ $row->id }}" class="btn btn-danger btn-sm">Batalkan Transaksi</a> -->
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(function(){
                $("#table").DataTable({
                    "lengthChange" : false,
                    "dom": '<"top pull-right"f>rt<"bottom pull-right"p><"clear">'
                })

                $(".btnBatal").click(function(e){
                    var id = $(this).attr('data-id')
                    swal({
                        title: "Apakah Anda Yakin?",
                        text: "Berikan keterangan kenapa transaksi dibatalkan!",
                        type: "input",
                        showCancelButton: true,
                        confirmButtonText: "Batalkan!",
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
                            keterangan : input
                        }
                        window.location.href = baseUrl+'batalTransaksi?id='+ id + '&k=' + input
                    })
                })
            })
        })
    </script>
@endsection
