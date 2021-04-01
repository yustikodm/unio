@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Point Topup
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pointTopups.store']) !!}

                        @include('point_topups.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection