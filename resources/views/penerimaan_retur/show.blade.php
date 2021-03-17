@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penerimaan Retur
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('penerimaan_retur.show_fields')                    
                </div>
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <h4>Barang Penerimaaan Retur</h4>
                        </div> 
                        <div class="box-body">
                            <div class="col-md-12">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangPenerimaan as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nama_barang }}</td>
                                                <td>{{ $row->jumlah }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <a href="{{ route('penerimaanRetur.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
