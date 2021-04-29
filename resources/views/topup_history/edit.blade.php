@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Point Topup</h1>
</section>

<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($topupHistory, ['route' => ['topup-history.update', $topupHistory->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

                @include('topup_history.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
