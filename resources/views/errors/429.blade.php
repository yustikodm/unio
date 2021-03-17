@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop
@section('message', __('Too Many Requests'))
