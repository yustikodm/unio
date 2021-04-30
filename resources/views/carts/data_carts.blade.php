@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Carts</h1>
</section>
<div class="content">
    @include('flash::message')
    <div class="row">
        <div class="col-sm-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Items in your cart</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        @forelse($carts as $cart)
                        <tr>
                            <td width="5%">
                                <input type="checkbox" name="item[{{ $cart->entity_id }}]" value="1">
                            </td>
                            <td width="45%">
                                <a href="#" class="text-navy">{{ $cart->name }}</a>
                                <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                            </td>
                            <td width="17%" class="text-right">{{ $cart->amount }}</td>
                            <td width="10%"><input type="number" name="qty" class="form-control" value="{{ $cart->qty }}"></td>
                            <td width="17%" class="text-right">
                                <h4>{{ $cart->amount * $cart->qty }}</h4>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Cart is empty</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cart Summary</h3>
                </div>
                <div class="box-body">
                    <h2>10.000</h2>
                    <a href="{{ route('carts.checkout') }}" class="btn btn-primary">Check out</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
