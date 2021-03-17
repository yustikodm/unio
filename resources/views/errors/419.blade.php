@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop
@section('message', __('Page Expired'))
