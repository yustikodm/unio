@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kartu Stok Penyesuaian
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'kartuStokPenyesuaian.store']) !!}

                        @include('kartu_stok_penyesuaian.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
