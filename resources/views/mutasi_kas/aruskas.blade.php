@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Arus Kas
        </h1>
    </section>
    <div class="content">
        <div class="box">
            <div class="box-header with-header">
                <div class="col-md-12">
                    <h4>Filter</h4>
                </div>
            </div>
            <div class="box-body">
                <form action="" method="get">
                <div class="form-group col-md-4">
                    <label>Tipe Kas:</label>
                    <select name="tp" id="#tipe" class="form-control select2">
                        <option <?= (Request::get('tp') == 'Semua') ? 'selected' : '' ?> value="Semua">Semua</option>
                        <option <?= (Request::get('tp') == 'Masuk') ? 'selected' : '' ?> value="Masuk">Masuk</option>
                        <option <?= (Request::get('tp') == 'Keluar') ? 'selected' : '' ?> value="Keluar">Keluar</option>
                    </select>
                </div>
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
                     @if(isset($kas))
                        @if(count($kas) != 0)
                         <a target="_blank" href="exportLaporanArusKas?tp={{ Request::get('tp') }}&f={{ Request::get('f') }}&t={{ Request::get('t') }}" class="btn btn-warning pull-right" name="e" style="margin-right: 5px;">
                            Export
                         </a>
                        @endif
                    @endif
                     <a href="arusKas" class="btn btn-danger pull-right" style="margin-right: 5px;">
                         Reset
                     </a>
                     <button class="btn btn-primary pull-right" id="btnFilter" style="margin-right: 5px;">
                         Cari
                     </button>
                    </form>
                </div>
            </div>
        </div>

        @if(isset($kas))
        <div class="box">
            <div class="box-header with-header">
                <div class="col-md-12">
                    <h4>
                        {{ ( count($kas) <= 0)  ? "Data Tidak ada" : 'Data Kas '.Request::get('tp') }}
                        @if(Request::get('tp') != "Semua")
                            <span class="pull-right">{{ ( count($kas) <= 0)  ? '' : "Total : Rp. ".number_format($jumlahKas) }}</span>
                        @endif
                    </h4>
                </div>
            </div>
            @if(Request::get('tp') == "Semua")
                @if(count($kas) >= 0)
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6" style="box-shadow: 0 0 1px 0 #000">
                                <h4>Kas Masuk <span class="pull-right">Total : Rp. {{ number_format($totalMasuk) }}</span></h4>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kas as $row)
                                            @if($row->tipe == "Masuk")
                                                <tr>
                                                    <td>{{ $row->kode }}</td>
                                                    <td>{{ $row->keterangan }}</td>
                                                    <td>Rp. {{ number_format($row->jumlah) }}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6" style="box-shadow: 0 0 1px 0 #000">
                                <h4>Kas Keluar <span class="pull-right">Total : Rp. {{ number_format($totalKeluar) }}</span></h4>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kas as $row)
                                            @if($row->tipe == "Keluar")
                                                <tr>
                                                    <td>{{ $row->kode }}</td>
                                                    <td>{{ $row->keterangan }}</td>
                                                    <td>Rp. {{ number_format($row->jumlah) }}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                @if(count($kas) >= 0)
                    <div class="box-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kas as $row)
                                    <tr>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>Rp. {{ number_format($row->jumlah) }}</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endif
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
