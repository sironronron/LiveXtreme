@extends('layouts.app')

@section('title', 'Cart checkout')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
@endsection

@section('content')

<div class="container m-t-150">
    <h5 class="text-center m-b-30">CART CHECKOUT</h5>
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <h6>Delivery Address</h6>
                @if ($address != null)
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p>
                                        <strong>
                                        {{ $address->firstname }} {{ $address->lastname }}
                                        </strong>
                                        <span class="float-right"><i class="fa fa-check-circle text-success fa-lg"></i></span>
                                    </p>
                                    <h6><small>{{ $address->address1 }}</small></h6>
                                    <h6><small>{{ $address->country }} - {{ $address->city }} - {{ $address->state }} - {{ $address->zipCode }}</small></h6>
                                    <h6><small>{{ '(+63) '. $address->telNo }}</small></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('address.create') }}">Add Address</a>
                @endif
                <hr>
				<h5 class="text-secondary">Payment Method</h5>
				<form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{ route('paywithpaypal') }}">
					{{ csrf_field() }}
					<h2 class="w3-text-blue">Payment Form</h2>
					<p>Demo PayPal form - Integrating paypal in laravel</p>
					<p>      
					<label class="w3-text-blue"><b>Enter Amount</b></label>
					<input class="w3-input w3-border" name="amount" type="text"></p>      
					<button class="w3-btn w3-blue">Pay with PayPal</button></p>
				  </form>
            </div>
            <div class="col-5">
                <div class="cart">
                    <h6 class="col-form-label text-secondary">Cart {{ Cart::instance()->count() }} Item(s)</h6>
                    @foreach (Cart::content() as $product)
                        <div class="media">
                            <img src="{{ asset('storage/'.$product->model['image']) }}" class="cart-img img-thumbnail mr-2" height="100" width="100" alt="{{ $product->name }}">
                            <div class="media-body">
                                <h6 class="float-right">{{ 'Php '.number_format($product->price, 2) }}</h6>
                                <h6 class="mt-0">{{ $product->name }}</h6>
                                <ul class="list-unstyled">
                                    <li class="text-secondary"><small>Quantity x{{ $product->qty }}</small></li>
                                    <li class="m-b-10"><small>{{ $product->options['size'] }}</small></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <input type="text" name="coupon" class="form-control form-control-lg" placeholder="Coupon">
                <hr>
                <div class="price-total">
                    <ul class="list-unstyled">
                        <li class="m-b-10 text-secondary">Subtotal <span class="text-dark float-right">{{ 'Php '.Cart::subtotal() }}</span></li>
                        <li class="m-b-10 text-secondary">Shipping <span class="text-dark float-right">--</span></li>
                        <li class="m-b-10 text-secondary">Tax (12%) <span class="text-dark float-right">--</span></li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="text-secondary"><h5>Total <span class="text-dark float-right"><b>{{ 'Php '.Cart::total() }}</b></span></h5></li>
                    </ul>
                </div>
            </div>
        </div>

</div>

@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/js/parsley.min.js') }}"></script>
@endsection

@endsection
