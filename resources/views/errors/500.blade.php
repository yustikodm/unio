@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop
@section('message', __('Server Error'))
