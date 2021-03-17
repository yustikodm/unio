@extends('layouts.app')

@section('content')
<div class="container-fluid">
  @if(Auth::user()->hasRole("admin"))  
    @include('data_dashboard')
  @endif
</div>

@endsection
