@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Klaim Hadiah</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <div class="alertMsg"></div>

        @include('flash::message')

        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-12">
                    @if(!empty($poin))
                    @else
                        <h3 align="center">Anda Belum Punya Poin</h3>
                    @endif
                </div>
            </div>
            @if(!empty($poin))
                <div class="box-body">
                    <span class="pull-left" style="font-size: 27px;">
                        <i class="fa fa-info-circle fa-fw text-warning" aria-hidden="true"></i>
                        {{$poin->poin}}
                    </span>
                    <table class="table table-striped table-bordered dataTable no-footer" id="dataKlaimhadiah">
                        <thead>
                            <tr>
                                <th>Hadiah</th>
                                <th>Syarat Poin</th>
                                <th>Stok</th>
                                <th>Tersedia Sampai</th>
                                <th>Klaim Hadiah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hadiah as $row)
                                <tr>
                                    <td>{{$row->nama_barang}}</td>
                                    <td>{{$row->poin}}</td>
                                    <td>{{$row->stok}}</td>
                                    <td>{{$row->tanggal_kadaluarsa}}</td>
                                    <td>
                                        @if($row->poin < $poin->poin)
                                            {!! Form::open(['route' => 'klaimReward']) !!}
                                                <input type="hidden" name="hadiah_id" value="{{ $row->id }}">
                                                <input type="hidden" name="mitra_id" value="{{ $poin->mitra_id }}">
                                                <button class="btn btn-success btn-xs btnKlaim" data-id="{{ $row->id }}">
                                                    <i class="fa fa-check"></i>
                                                    Klaim
                                                </button>
                                            {!! Form::close() !!}
                                        @else
                                            <button class="btn btn-warning btn-xs btnKlaim" disabled>
                                                <i class="fa fa-times"></i>
                                                Belum Bisa Klaim
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="text-center">

        </div>
    </div>
    @if(!empty($poin))
    <script>
        $("#dataKlaimhadiah").DataTable({
            "lengthChange" : false,
            "dom": '<"top pull-right"f>rt<"bottom pull-right"p><"clear">'
        })
        $('.btnKlaim').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                title: "Apakah Anda Yakin?",
                text: "Untuk Mengambil Hadiah Ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(isConfirm){
                if (isConfirm) form.submit();
            });
        });

    </script>
    @endif
@endsection

