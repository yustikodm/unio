@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paket
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                @include('promo.show_fields')
                <a href="{{ route('promo.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
