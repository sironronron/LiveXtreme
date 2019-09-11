@extends('layouts.app')

@section('title', 'Live to the fullest Live Extremely')

@section('content')

<section class="section m-t-30">
	<div class="container-fluid">
		<span class="float-right"><a href="{{ route('store.index') }}" class="text-link">SHOP ALL <span data-feather="chevron-right"></span></a></span>
		<h4 class="main-title">RANDOM COLLECTION</h4>
		<div class="row">
			@foreach ($randomCollection as $product)
				<div class="col-lg-3 m-t-30 m-b-15">
					<div class="product-grid3">
						<div class="product-image3">
							<a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->slug]) }}">
								<?php
									$img1 = json_decode($product->images, true)[0];
									if (!isset(json_decode($product->images, true)[1])) {
										json_decode($product->images, true)[1] = null;
									} else {
										$img2 = json_decode($product->images, true)[1];
									}
								?>
								<img class="pic-1 img-product" src="{{ asset('storage/'.$product->image) }}">
								<img class="pic-2 img-product" src="{{ asset('storage/'.$img2) }}">
							</a>
							<ul class="social">
								<li><button type="submit"><i class="fa fa-shopping-bag"></i></button></li>
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
							@if ($product->discount != null)
								<span class="product-discount-label">{{ $product->discount.'% off' }}</span>
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
									<span>{{ number_format($product->price, 2) }}</span>
								@else
									Php {{ number_format($product->price, 2) }}
								@endif
							</div>
							<ul class="rating">
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star disable"></li>
								<li class="fa fa-star disable"></li>
							</ul>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<hr>
		<h4 class="main-title m-t-30">NEW ARRIVALS!</h4>
		<div class="row">
			@foreach ($latests as $product)
				<div class="col-md-3 m-t-30 m-b-15">
					<div class="product-grid3">
						<div class="product-image3">
							<a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->slug]) }}">
								<?php
									$img1 = json_decode($product->images, true)[0];
									if (!isset(json_decode($product->images, true)[1])) {
										json_decode($product->images, true)[1] = null;
									} else {
										$img2 = json_decode($product->images, true)[1];
									}
								?>
								<img class="pic-1 img-product" src="{{ asset('storage/'.$product->image) }}">
								<img class="pic-2 img-product" src="{{ asset('storage/'.$img2) }}">
							</a>
							<ul class="social">
								<li><button><i class="fa fa-shopping-bag"></i></button></li>
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
							@if ($product->discount != null)
								<span class="product-discount-label">{{ $product->discount.'% off' }}</span>
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
								@else
									Php {{ number_format($product->price, 2) }}
								@endif
							</div>
							<ul class="rating">
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star disable"></li>
								<li class="fa fa-star disable"></li>
							</ul>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<hr>
		<h4 class="main-title m-t-30">GIRL POWER!</h4>
		<div class="row">
			@foreach ($girlPower as $product)
				<div class="col-md-3 m-t-30 m-b-15">
					<div class="product-grid3">
						<div class="product-image3">
							<a href="{{ route('store.show', ['id' => $product->id, 'slug' => $product->slug]) }}">
								<?php
									$img1 = json_decode($product->images, true)[0];
									if (!isset(json_decode($product->images, true)[1])) {
										json_decode($product->images, true)[1] = null;
									} else {
										$img2 = json_decode($product->images, true)[1];
									}
								?>
								<img class="pic-1 img-product" src="{{ asset('storage/'.$product->image) }}">
								<img class="pic-2 img-product" src="{{ asset('storage/'.$img2) }}">
							</a>
							<ul class="social">
								<li><button><i class="fa fa-shopping-bag"></i></button></li>
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
								<div>
									<span class="product-new-label">New</span>
								</div>
							@endif
							@if ($product->discount != null)
								<div>
									<span class="product-discount-label">{{ $product->discount.'% off' }}</span>
								</div>
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
								@else
									Php {{ number_format($product->price, 2) }}
								@endif
							</div>
							<ul class="rating">
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star disable"></li>
								<li class="fa fa-star disable"></li>
							</ul>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

@endsection