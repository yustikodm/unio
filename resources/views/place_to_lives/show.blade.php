@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>Place To Live</h1>
</section>
<div class="content">
  <div class="box box-primary">
    <div class="box-body">
      <div class="row" style="padding-left: 20px">
        @include('place_to_lives.show_fields')
        <a href="{{ route('place-to-live.index') }}" class="btn btn-default">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection
