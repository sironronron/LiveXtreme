@extends('layouts.app')

<?php
	$userName = Auth::user()->name;
?>
@section('title', "Member Profile '$userName'")

@section('content')

<div class="container-fluid m-t-115">
	<h6 class="text-secondary float-left"><a href="{{ route('store.index') }}"><i class="fa fa-chevron-left fa-sm m-r-5"></i>Return to Store</a></h6>
	<h5 class="text-center"><b>ACCOUNT DETAILS AND ORDER HISTORY</b></h5>
	<div class="row m-t-50">
		<div class="col-sm-3">
			@include('widgets.profile._sidebar')
		</div>
		<div class="col">
			<div class="settings">
				<a href="#" class="float-right" style="text-decoration: underline;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
                </form>

				<p>You haven't placed any orders yet.</p>
			</div>
		</div>
	</div>
</div>

@endsection
