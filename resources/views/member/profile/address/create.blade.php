@extends('layouts.app')

@section('title', 'Add Address Information')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
@endsection

@section('content')

    <div class="container-fluid m-t-115">
        <h6 class="text-secondary float-left"><a href="{{ route('store.index') }}"><i class="fa fa-chevron-left fa-sm m-r-5"></i>Return to Store</a></h6>
    	<h5 class="text-center"><b>ADD ADDRESS INFORMATION</b></h5>

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
    				<a href="{!! route('profile.index') !!}" style="text-decoration: underline;">Return to account details.</a>
    			</div>
                <div class="create m-t-50">
                    @include('widgets._messages')
                    <h6><strong>ADD A NEW ADDRESS</strong></h6>
                    <div class="row">
                        <div class="col-10">
                            <form class="" action="{!! route('address.store') !!}" data-parsley-validate="" method="post">
                            {{ csrf_field() }}
                                <div class="row m-t-20">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="firstname" class="form-control form-control-lg" placeholder="First Name" required="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="lastname" class="form-control form-control-lg" placeholder="Last Name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="address1" class="form-control form-control-lg" placeholder="Address 1" required="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="address2" class="form-control form-control-lg" placeholder="Address 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <select name="country" id="country" class="custom-select custom-select-lg" required="">
                                                <option>Select Country</option>
                                                @foreach ($countries as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control form-control-lg" placeholder="City" required="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="state" class="form-control form-control-lg" placeholder="State" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="zipCode" class="form-control form-control-lg" placeholder="Postal/Zip Code" required="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="telNo" class="form-control form-control-lg" placeholder="Phone No." required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark"><small>ADD ADDRESS</small></button>
                                    <button class="btn btn-light" onclick="window.history.go(-1); return false;"><small>CANCEL</small></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    		</div>
    	</div>
    </div>

    @section('scripts')
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('/js/parsley.min.js') }}"></script>
    @endsection

@endsection
