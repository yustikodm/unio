@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop
@section('message', __('Unauthorized'))
