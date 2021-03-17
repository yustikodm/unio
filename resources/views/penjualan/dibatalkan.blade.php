@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Data Transaksi Dibatalkan</h1>
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
                            <th>Total</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->kode}}</td>
                                <td>{{$row->pelanggan_nama}}</td>
                                <td>Rp. {{number_format($row->total)}}</td>
                                <td>{{$row->keterangan}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <a href="{{ route('penjualan.show', $row->id) }}" class='btn btn-default btn-xs'>
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
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

            })
        })
    </script>
@endsection
