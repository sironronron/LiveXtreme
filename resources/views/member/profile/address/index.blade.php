@extends('layouts.app')

@section('title', 'Address Book')

@section('content')

<div class="container-fluid m-t-115">
    <h6 class="text-secondary float-left"><a href="{{ route('profile.index') }}"><i class="fa fa-chevron-left fa-sm m-r-5"></i>Return to Profile</a></h6>
	<h5 class="text-center"><b>ADDRESS BOOK</b></h5>

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

                @if (count($addresses) == null)
                    <p>You don't have any addresses yet. <a href="{!! route('address.create') !!}" class="text-primary" style="text-decoration: underline;"><small>Add Address</small></a></p>
                @else
                    <a href="{!! route('address.create') !!}" style="text-decoration:underline;">Add new Address</a>
                @endif
			</div>

            <div class="address m-t-30">
                @include('widgets._messages')
                <div class="row">
                    @foreach ($addresses as $address)
                    <div class="col-5">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p>
                                    <strong>
                                    {{ $address->firstname }} {{ $address->lastname }}
                                    </strong>
                                    @if ($address->default == 1)
                                        <span class="text-primary"><small>Default</small></span>
                                    @else
                                        <form action="{!! route('default.change', $address->id) !!}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <button class="btn btn-link" style="text-decoration: underline;"><small>Make Default</small></button>
                                        </form>
                                    @endif
                                    <span class="float-right">
                                        <a href="{!! route('address.edit', $address->id) !!}"><small><i class="fa fa-pencil-square-o"></i> Edit</small></a>
                                    </span>
                                </p>
                                <h6><small>{{ $address->address1 }}</small></h6>
                                <h6><small>{{ $address->country }} - {{ $address->city }} - {{ $address->state }} - {{ $address->zipCode }}</small></h6>
                                <h6><small>{{ '(+63) '. $address->telNo }}</small></h6>
                                <form action="{!! route('address.destroy', $address->id) !!}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><small>Delete</small></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
		</div>
	</div>

</div>

@endsection
