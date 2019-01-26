@extends('layouts.app')

@section('title', 'Shop all Products')

@section('content')

<div class="container m-t-150">
	<div class="row">
		<div class="col-sm-2">
			<div class="card">
				<div class="card-body shadow"></div>
			</div>
		</div>
		<div class="col">
			<div class="row">
				@foreach($products as $product)
					<div class="col-md-3 m-b-15">
			            <div class="product-grid3">
			                <div class="product-image3">
			                	<?php
									$img1 = json_decode($product->images, true)[0];
									if (!isset(json_decode($product->images, true)[1])) {
										json_decode($product->images, true)[1] = null;
									} else {
										$img2 = json_decode($product->images, true)[1];
									}
								?>
			                    <a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->slug]) }}" class="change-page">
			                        <img class="pic-1 img-product-2" src="{{ asset('storage/'.$product->image) }}">
			                        <img class="pic-2 img-product-2" src="{{ asset('storage/'.$img2) }}">
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
			<div class="mx-auto text-center">
				{{ $products->links() }}
			</div>
		</div>
	</div>
</div>

@endsection