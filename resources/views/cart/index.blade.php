@extends('layouts.app')

@section('title', 'Cart')

@section('content')

	<div class="container m-t-150">
		<h5 class="text-center m-b-30">SHOPPING CART</h5>
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
			      						<li class="cart-prod-name mb-3"><a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->model['slug']]) }}" target="_blank">{{ $product->name }} <i data-feather="external-link" width="12" height="12"></i></a></li>
			      						<li class="cart-prod-second"><small></small></li>
			      						<li class="cart-prod-second"><small>{{ $product->options['size'] }}</small></li>
			      						<li class="cart-prod-second"><small>Php {{ number_format($product->price, 2) }}</small></li>
			      					</ul>
			      				</div>
			      			</div>
			      		</th>
			      		<td class="text-center">
			      			<div id="field1" class="input-group cart-qty-btn">
							  	<div class="input-group-prepend">
							    	<button type="button" class="btn btn-secondary sub">-</button>
							  	</div>
							  	<input type="number" class="form-control text-center field" id="2" aria-label="Amount (to the nearest dollar)" min="1" max="10" value="1">
							  	<div class="input-group-append">
							    	<button type="button" class="btn btn-secondary add">+</button>
							  	</div>
							</div>
							<form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-link m-t-50"><small>Remove</small></button>
							</form>
							<form action="{{ route('cart.switchToSaveForLater', $product->rowId) }}" method="POST">
								{{ csrf_field() }}
								<button class="btn btn-link"><small>Save For Later</small></button>
							</form>
			      		</td>
			     		<td class="text-center">
			     			<h6 class="text-secondary m-t-50">
								Php {{ number_format($product->price, 2) }}
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
							TOTAL
							<span class="float-right">
								Php {{ Cart::total() }}
							</span>
						</th>
					</tr>
				</thead>
			</table>

			<h6 class="float-right text-secondary"><small>FREE UK SHIPPING WHEN YOU SPEND MORE THAN £35*</small></h6>

			<div class="checkout m-t-50">
				<div class="row">
					<div class="col-md-6 offset-md-6">
						<div class="row">
							<div class="col">
								<a href="#" class="btn btn-light btn-block border"><small>UPDATE CART</small></a>
							</div>
							<div class="col">
								<a href="{!! route('checkout.index') !!}" class="btn btn-dark btn-block"><small>CHECKOUT</small></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		@else
			<div class="text-center">
				<p class="text-dark">No item on your cart!</p>
				<a href="{{ route('store.index') }}" class="btn btn-outline-dark">Go To Market</a>
			</div>
		@endif

		<div class="saved-for-later m-t-50">
			@if (Cart::instance('saveForLater')->count() > 0)
				<h6 class="text-dark">Saved For Later</h6>
				<h6><small>{{ Cart::instance('saveForLater')->count() }} item(s) is Saved For Later</small></h6>
				@foreach (Cart::instance('saveForLater')->content() as $product)
					<div class="row sfl-row">
						<form action="{{ route('saveForlater.destroy', $product->rowId) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="close sfl-close" data-dismiss="modal" aria-label="Close">
					          	<span aria-hidden="true">&times;</span>
					        </button>
						</form>
						<div class="col-3">
							<div class="media">
								<img src="{{ asset('storage/'.$product->model['image']) }}" class="img-thumbnail mr-3" height="95" width="95" alt="{{ $product->name }}">
								<div class="media-body">
									<h6 class="text-dark mt-0">{{ $product->name }}</h6>
									<h6 class="text-secondary"><small>Php {{ number_format($product->price, 2) }}</small></h6>
								</div>
							</div>
						</div>
						<div class="col-4">
							<h6><small><b>Details</b></small></h6>
							<h6><small>{!! $product->model['details'] !!}</small></h6>
						</div>
						<div class="col">
							<form action="{!! route('saveForlater.switchToCart', $product->rowId) !!}" method="post">
								{{ csrf_field() }}
								<button class="btn btn-link"><small>Add To Cart</small></button>
							</form>
						</div>
					</div>
					<hr>
				@endforeach
			@endif
		</div>

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

@section('scripts')

	<script type="text/javascript">
	$('.add').click(function () {
		$(this).prev().val(+$(this).prev().val() + 1);
	});
	$('.sub').click(function () {
		if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
	});
	</script>

@endsection

@endsection
