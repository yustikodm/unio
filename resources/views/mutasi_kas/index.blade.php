@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Mutasi Kas</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Kas Masuk</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Kas Keluar</a></li>
                        <li><a href="{{route('mutasiKas.create')}}"> <i class="fa fa-plus"></i>  Tambah Data</a></li>
                        <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <h4>Total : Rp. {{ number_format($totalMasuk) }}</h4>
                            <table class="table table-bordered table-hover table-striped" id="kasMasuk">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kasMasuk as $row)
                                    <tr>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>Rp. {{ number_format($row->jumlah) }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            {!! Form::open(['route' => ['mutasiKas.destroy', $row->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                <a href="{{ route('mutasiKas.show', $row->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="{{ route('mutasiKas.edit', $row->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'onclick' => "return confirm('Are you sure?')"
                                                ]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <h4>Total : Rp. {{ number_format($totalKeluar) }}</h4>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kasKeluar as $row)
                                    <tr>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>Rp. {{ number_format($row->jumlah) }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            {!! Form::open(['route' => ['mutasiKas.destroy', $row->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                <a href="{{ route('mutasiKas.show', $row->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="{{ route('mutasiKas.edit', $row->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'onclick' => "return confirm('Are you sure?')"
                                                ]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
    <style>

    </style>
    <script>
        $(document).ready(function() {
            $('.table').DataTable( {
                dom: '<"pull-right"f>Brtip',
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'excel',
                        ]
                    }
                ]
            });
        } );
    </script>
@endsection

