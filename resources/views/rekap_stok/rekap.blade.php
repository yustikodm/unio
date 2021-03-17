@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Rekap Stok</h1>
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
                     <!-- <label>
                        Kolom:<br>
                        <select class="form-control select2" name="column" style="width: 145px; padding: 0px; height: 33px;">
                            <option>Pilih Kolom</option>
                            <option>Kode</option>
                            <option>Pelanggan</option>
                            <option>Ppn</option>
                            <option>Diskon</option>
                            <option>Total</option>
                            <option>Bayar</option>
                            <option>Tanggal</option>
                        </select>
                     </label>
                     <label>
                        Cari Data:<br><input type="text" class="form-control input-sm" name="valueSearch">
                     </label> -->
                     <div class="form-group col-md-6">
                        <label>Dari:</label>
                        <input type="date" <?= (Request::get('f') !== '') ? 'value="'.Request::get('f').'"' : '' ?> class="form-control input-sm" id="datepicker_from" name="f" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>
                            Sampai:
                        </label>
                            <input type="date" class="form-control input-sm" id="datepicker_to" name="t" required="" <?= (Request::get('t') !== '') ? 'value="'.Request::get('t').'"' : '' ?>>
                    </div>
            </div>
            <div class="box-footer">
                <div class="col-md-12">
                    @if(isset($rekap))
                        @if(count($rekap) != 0)
                         <a target="_blank" href="exportRekapStok?f={{ Request::get('f') }}&t={{ Request::get('t') }}" class="btn btn-warning pull-right">
                            Export
                         </a>
                        @endif
                    @endif
                     <a href="rekapStok" class="btn btn-danger pull-right" style="margin-right: 5px;">
                         Reset
                     </a>
                     <button class="btn btn-primary pull-right" id="btnFilter" style="margin-right: 5px;">
                         Cari
                     </button>
                    </form>
                </div>
            </div>
        </div>

        @if(isset($rekap))
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Stok Awal</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Stok Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rekap as $row)
                                <tr>
                                    <td>{{ $row->barang }}</td>
                                    <td>{{ $row->stok_awal }}</td>
                                    <td>{{ $row->masuk }}</td>
                                    <td>{{ $row->keluar }}</td>
                                    <td>{{ $row->stok_akhir }}</td>
                                </tr>
                            @endforeach
                            @if(count($rekap) == 0)
                                <tr>
                                    <td colspan="5">Data Tidak ada</td>
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

