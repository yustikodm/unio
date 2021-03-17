@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kartu Stok Penyesuaian
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('kartu_stok_penyesuaian.show_fields')
                    <a href="{{ route('kartuStokPenyesuaian.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
