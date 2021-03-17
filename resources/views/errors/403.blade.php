@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')

@section('error-link')
    <a class="btn btn-link" href="{{ route('home') }}">Beranda</a>
@stop

@section('message', __($exception->getMessage() ?: 'Forbidden'))
