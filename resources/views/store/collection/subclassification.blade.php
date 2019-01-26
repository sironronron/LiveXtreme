@extends('layouts.app')

<?php

$categoryName = $subclass->subcategory->category['name'];
$subcategoryName = $subclass->subcategory->name;
$name = $subclass->name;
?>

@section('title', "$categoryName's $subcategoryName, $name")

@section('content')

<div class="container m-t-150">
	<div class="row">
		<div class="col-sm-2">
			<hr>
		</div>
		<div class="col">
			<div class="row">
				@forelse($products as $product)
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
			                    <ul class="social">
			                        <li><button type="submit" class="btn-submit"><i class="fa fa-shopping-bag"></i></button></li>
			                        <li>
			                        	<form action="{{ route('add-to-cart') }}" method="POST">
											{{ csrf_field() }}
			                        		<input type="hidden" name="id" value="{{ $product->id }}">
				                        	<input type="hidden" name="name" value="{{ $product->name }}">
				                        	<input type="hidden" name="price" value="{{ $product->price }}">
				                        	<button type="submit" class="btn-submit"><i class="fa fa-shopping-cart"></i></button>
			                        	</form>
			                        </li>
			                    </ul>
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
				@empty
					<div class="col text-center">
						No Data
					</div>
				@endforelse
			</div>
			<div class="mx-auto text-center">
				{{ $products->links() }}
			</div>
		</div>
	</div>
</div>

@endsection