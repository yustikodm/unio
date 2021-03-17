@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penyesuaian Stok
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('penyesuaian_stok.show_fields')                    
                </div>
                <div class="row">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Barang</th>
                                                <th>Stok Database</th>
                                                <th>Stok Lapangan</th>
                                                <th>Tipe</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barangPenyesuaian as $row)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$row->nama_barang}}</td>
                                                    <td>{{$row->stok_database}}</td>
                                                    <td>{{$row->stok_lapangan}}</td>
                                                    <td>{{$row->tipe}}</td>
                                                    <td>{{$row->jumlah}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('penyesuaianStok.index') }}" class="btn btn-default">Back</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
