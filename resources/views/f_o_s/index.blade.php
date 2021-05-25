@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>F O S</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('f_o_s.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

