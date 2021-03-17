@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop
@section('message', __('Not Found'))
