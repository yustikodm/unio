@extends('layouts.app')
@section('title', 'Users')

@section('content')
    <section class="content-header">
        <h1>Users</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('users.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('page_scripts')
    <script>
      let userUrl = '{{url('users')}}/'
    </script>
    <script src="{{ asset('assets/users/user.js') }}"></script>
@endsection

