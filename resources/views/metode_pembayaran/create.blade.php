@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Metode Pembayaran
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'metodePembayaran.store']) !!}

                        @include('metode_pembayaran.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
