@extends('layouts.app')

<?php
	$userName = Auth::user()->name;
?>
@section('title', "Member Profile '$userName'")

@section('content')

<div class="container-fluid m-t-115">
	<h6 class="text-secondary float-left"><a href="{{ route('store.index') }}"><i class="fa fa-chevron-left fa-sm m-r-5"></i>Retrurn to Store</a></h6>
	<h5 class="text-center"><b>ACCOUNT DETAILS AND ORDER HISTORY</b></h5>
	<div class="row m-t-50">
		<div class="col-sm-3">
			<div class="card bg-grey">
				<div class="card-body">
					<h6 class="acc-name"><small>{{ Auth::user()->name }}</small></h6>
					<h6 class="text-secondary"><small><b>{{ Auth::user()->email }}</b></small></h6>
					<div class="address m-t-30">
						<a href="#" class="text-secondary" style="text-decoration: underline;"><small>View Addresses (0)</small></a>
					</div>
				</div>
			</div>
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