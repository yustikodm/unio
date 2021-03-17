@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Laporan Transaksi</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    <h4>Filter</h4>
                </div>
            </div>
            <div class="box-body">
                    <form action="" method="get">
                    <div class="form-group col-md-4">
                        <label> Status: </label>
                        <select class="form-control select2" name="s">
                            <option <?= (Request::get('s') == 'Semua') ? 'selected' : '' ?> value="Semua">Semua</option>
                            <option <?= (Request::get('s') == 'Diproses') ? 'selected' : '' ?> value="Diproses">Belum Dibayar</option>
                            <option <?= (Request::get('s') == 'Dibayar') ? 'selected' : '' ?> value="Dibayar">Dibayar</option>
                            <option <?= (Request::get('s') == 'Dibatalkan') ? 'selected' : '' ?> value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                     <!-- <label>
                        Cari Data:<br><input type="text" class="form-control input-sm" name="valueSearch">
                     </label> -->
                     <div class="form-group col-md-4">
                        <label>Dari:</label>
                        <input type="date" <?= (Request::get('f') !== '') ? 'value="'.Request::get('f').'"' : '' ?> class="form-control input-sm" id="datepicker_from" name="f" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>
                            Sampai:
                        </label>
                            <input type="date" class="form-control input-sm" id="datepicker_to" name="t" required="" <?= (Request::get('t') !== '') ? 'value="'.Request::get('t').'"' : '' ?>>
                    </div>
            </div>
            <div class="box-footer">
                <div class="col-md-12">
                     @if(isset($penjualan))
                        @if(count($penjualan) != 0)
                         <a target="_blank" href="exportLaporanPenjualan?s={{ Request::get('s') }}&f={{ Request::get('f') }}&t={{ Request::get('t') }}" class="btn btn-warning pull-right" name="e" style="margin-right: 5px;">
                            Export
                         </a>
                        @endif
                    @endif
                     <a href="laporanPenjualan" class="btn btn-danger pull-right" style="margin-right: 5px;">
                         Reset
                     </a>
                     <button class="btn btn-primary pull-right" id="btnFilter" style="margin-right: 5px;">
                         Cari
                     </button>
                    </form>
                </div>
            </div>
        </div>

        @if(isset($penjualan))
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-md-12">
                        <h4>Data Penjualan</h4>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Pelanggan</th>
                                <!-- <th>Ppn</th>
                                <th>Voucher Diskon</th> -->
                                <th>Total</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $row)
                                <tr>
                                    <td>{{$row->kode}}</td>
                                    <td>{{$row->pelanggan_nama}}</td>
                                    <!-- <td>{{$row->ppn}}</td> -->
                                    <!-- <td>{{$row->kode_voucher}}</td> -->
                                    <td>Rp. {{number_format($row->total)}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <div class="btb-group">
                                            <a href="penjualan/{{ $row->id }}" class="btn btn-xs btn-default">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($penjualan) == 0)
                                <tr>
                                    <td colspan="8" align="center">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    <script>
        $(document).ready(function(){
            $(function(){
                $(".table").DataTable({
                    "lengthChange" : false,
                    "dom": '<"top pull-right"f>rt<"bottom pull-right"p><"clear">'
                })
            })
        })
    </script>
@endsection

