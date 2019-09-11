@extends('layouts.app')

@section('title', "$product->name")

@section('content')

<div class="container-fluid m-t-150">
	<div class="row">
		<div class="col-lg-6 offset-lg-1">
			<div class="row">
				@if ($product->images)
					@foreach (json_decode($product->images, true) as $image)
						@if (count(json_decode($product->images)) != 1)
							<div class="col-lg-6 col-img">
								<img src="{{ asset('storage/'.$image) }}" class="pr-thumbnail img-fluid" alt="{{ $product->name }}">
							</div>
						@endif
					@endforeach
				@endif
			</div>
		</div>
		<div class="col-lg-4">
			<div class="product-details">
				@if($product->created_at->format('Y-m-d 00:00:00') == \Carbon\Carbon::today())
					<span class="badge badge-dark m-b-10">New Item!</span>
				@endif
				<h6>{{ $product->category->name }}'s {{ $product->subclassification->name }}
					<span class="float-right">
						@if($product->discount != 0)
							<?php
								$discount = $product->discount / 100;
								$current_price = $product->price;
								$discounted = $discount * $current_price;
								$totalPrice = $current_price - $discounted;
							?>
							Php {{ number_format($totalPrice, 2) }} <br>
							<strike><small class="text-secondary">Php {{ number_format($product->price, 2) }}</small></strike>
						@else
						Php {{ number_format($product->price, 2) }}
						@endif
					</span>
				</h6>
				<h2 class="text-dark m-t-15">
					{{ $product->name }}
				</h2>
				<div class="product-sizes">
					<h6 class="m-t-30">Select Size <span class="float-right">Size Guide</span></h6>
					<div class="sizes m-t-30">
						<button class="btn btn-outline-dark btn-lg">S</button>
						<button class="btn btn-outline-dark btn-lg">M</button>
						<button class="btn btn-outline-dark btn-lg">L</button>
						<button class="btn btn-outline-dark btn-lg">XL</button>
						<button class="btn btn-outline-dark btn-lg">2XL</button>
					</div>
				</div>
				<div class="add-to-cart m-t-30">
					<form action="{!! route('add-to-cart') !!}" method="POST">
						{{ method_field('POST') }}
						{{ csrf_field() }}
						<input type="hidden" name='id' value="{{ $product->id }}">
						<input type="hidden" name='name' value="{{ $product->name }}">
						<input type="hidden" name='price' value="{{ $product->discount != 0 ? $totalPrice : $product->price }}">
						<button type="submit" class="btn btn-dark btn-lg btn-block btn-submit"><small>Add to Cart</small></button>
					</form>
					<br>
					<button class="btn btn-dark btn-lg"><small><span data-feather="heart" width="15" height="15"></span></small></button>
				</div>
				<div class="details m-t-50 text-justify">
					{{ $product->details }}
				</div>
				<div class="collapse description m-t-30" id="descriptionCollapse">
					<p>{!! $product->description !!}</p>
				</div>
				<a class="text-primary" id="collapseButton" data-toggle="collapse" href="#descriptionCollapse" role="button" aria-expanded="false" aria-controls="collapseExample"></a>

				<div class="reviews">
					<h5>Reviews (0)
						<span class="float-right">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<a id="showReviews" data-toggle="collapse" href="#reviewCollapse" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
						</span>
					</h5>
					<div class="collapse review-collapse m-t-30 text-justify" id="reviewCollapse">
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<span class="m-l-10">3.9 Stars</span>
						</div>
						<a href="#" class="text-dark m-t-20" style="text-decoration: underline;">Write a Reviews</a>
						<div class="hreviews m-t-30">
							<div class="rev2">
								<h6><B>FLAWLESS</B></h6>
								<h6 class="text-dark">
									<small>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<span class="rev2-det text-secondary m-l-15">DemrickS - Jan 08, 2019</span>
									</small>
								</h6>
								<h6 class="m-t-10 text-secondary">
									<small>
										I'm very skeptical about ordering shoe wear online because of my weird and narrow feet...LOL, also because photos seem to look better than the actual product however I decided to take a chance on the Air VaporMax Plus in Black/White. I'm glad I did. Simply put, AWESOME shoes. They fit perfect and look GREAT. Lightweight, very comfortable and stable at the same time. They are indeed true to size and feel like they was made specifically for my feet.
									</small>
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="might-like m-t-50 m-l-15 m-r-15">
		<h4 class="main-title text-center m-b-30">YOU MIGHT LIKE</h4>
		<div class="row">
			@foreach ($mightLikeProducts as $mightProd)
				<div class="col-2 m-b-15">
					<div class="product-grid3">
						<div class="product-image3">
							<a href="{{ route('store.show', ['id' => $mightProd->id, 'slug' => $mightProd->slug]) }}">
								<img class="pic-1 img-product-2" src="{{ asset('storage/'.$mightProd->image) }}">
							</a>
							@if($mightProd->created_at->format('Y-m-d 00:00:00') == \Carbon\Carbon::today())
								<span class="product-new-label">New</span>
							@endif
						</div>
						<div class="product-content">
							<h3 class="title"><a href="{{ route('store.show', ['id' => $mightProd->id, 'slug' => $mightProd->slug]) }}">{{ $mightProd->name }}</a></h3>
							<div class="price">
								@if($mightProd->discount != 0)
									<?php
										$discount = $mightProd->discount / 100;
										$current_price = $mightProd->price;
										$discounted = $discount * $current_price;
										$totalPrice = $current_price - $discounted;
									?>
									Php {{ number_format($totalPrice,2) }}
									<span>Php {{ number_format($mightProd->price) }}</span>
								@else
									Php {{ number_format($mightProd->price, 2) }}
								@endif
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
