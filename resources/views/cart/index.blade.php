@extends('layouts.app')

@section('title', 'Cart')

@section('content')

	<div class="container m-t-150">
		<h5 class="text-center m-b-30"><b>SHOPPING CART</b></h5>
		@include('widgets._messages')
		@if(Cart::count() != null)
			<table class="table table-bordered table-hoverable">
			  	<thead class="thead-dark">
			    	<tr>
				      	<th scope="col" style="width: 65%"><small>ITEM</small></th>
				      	<th scope="col" class="text-center" style="width: 20%;"><small>QUANTITY</small></th>
				      	<th scope="col" class="text-center" style="width: 15%;"><small>SUBTOTAL</small></th>
			    	</tr>
			  	</thead>
			  	<tbody>
			  	@foreach (Cart::content() as $product)
			    	<tr>
			      		<th scope="row">
			      			<div class="media cart-med">
			      				<img src="{{ asset('storage/'. $product->model['image']) }}" class="cart-prod-img mr-3" alt="{{ $product->name }}">
			      				<div class="media-body">
			      					<ul class="list-unstyled">
			      						<li class="cart-prod-name mb-3"><a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->model['slug']]) }}">{{ $product->name }} <i data-feather="external-link" width="12" height="12"></i></a></li>
			      						<li class="cart-prod-second"><small></small></li>
			      						<li class="cart-prod-second"><small>{{ $product->options['size'] }}</small></li>
			      						<li class="cart-prod-second"><small>Php {{ number_format($product->price, 2) }}</small></li>
			      					</ul>
			      				</div>
			      			</div>
			      		</th>
			      		<td class="text-center">
			      			<div class="input-group cart-qty-btn">
							  	<div class="input-group-prepend">
							    	<button type="button" class="btn btn-secondary">+</button>
							  	</div>
							  	<input type="number" class="form-control text-center" aria-label="Amount (to the nearest dollar)" min="1" max="10" value="1">
							  	<div class="input-group-append">
							    	<button type="button" class="btn btn-secondary">-</button>
							  	</div>
							</div>
							<form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-link m-t-50"><small>Remove</small></button>
							</form>
			      		</td>
			     		<td class="text-center">
			     			<h6 class="text-secondary m-t-50">
			     				@if($product->model['discount'] != 0)
									<?php
										$discount = $product->model['discount'] / 100;
										$current_price = $product->price;
										$discounted = $discount * $current_price;
										$totalPrice = $current_price - $discounted;
									?>
									Php {{ number_format($totalPrice, 2) }} <br>
									<strike><small class="text-secondary">Php {{ number_format($product->price, 2) }}</small></strike>
								@else
								Php {{ number_format($product->price, 2) }}
								@endif
			     			</h6>
			     		</td>
			    	</tr>
			    @endforeach
			  	</tbody>
			</table>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="width: 65%"><a href="{{ route('store.index') }}" class="text-secondary" style="text-decoration: underline"><small>Continue Shopping</small></a></th>
						<th>
							<b>TOTAL</b>
							<span class="float-right">
								<b>
									<h3>
										Php {{ Cart::total() }}
									</h3>
								</b>
							</span>
						</th>
					</tr>
				</thead>
			</table>
		@else
			<div class="text-center">
				<p class="text-dark">No item on your cart!</p>
				<a href="{{ route('store.index') }}" class="btn btn-outline-dark">Go To Market</a>
			</div>
		@endif
	</div>

	<div class="might-like m-t-150 m-l-15 m-r-15">
		<h4 class="main-title text-center m-b-30"><strong>YOU MIGHT LIKE</strong></h4>
		<div class="row">
			@foreach ($mightLikeProducts as $product)
				<div class="col-2 m-b-15">
					<div class="product-grid3">
						<div class="product-image3">
							<a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->slug]) }}">
								<img class="pic-1 img-product-2" src="{{ asset('storage/'.$product->image) }}">
							</a>
							@if($product->created_at->format('Y-m-d 00:00:00') == \Carbon\Carbon::today())
								<span class="product-new-label">New</span>
							@endif
						</div>
						<div class="product-content">
							<h3 class="title"><a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
							<div class="price">
								@if($product->discount != 0)
									<?php
										$discount = $product->discount / 100;
										$current_price = $product->price;
										$discounted = $discount * $current_price;
										$totalPrice = $current_price - $discounted;
									?>
									Php {{ number_format($totalPrice,2) }}
									<span>Php {{ number_format($product->price) }}</span>
								@else
									Php {{ number_format($product->price, 2) }}
								@endif
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection