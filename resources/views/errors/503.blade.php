@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
