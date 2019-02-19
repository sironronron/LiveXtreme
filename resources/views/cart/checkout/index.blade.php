@extends('layouts.app')

@section('title', 'Cart checkout')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
@endsection

@section('content')

<div class="container m-t-150">
    <h5 class="text-center m-b-30"><b>CART CHECKOUT</b></h5>
    <form action="{!! route('checkout.store') !!}" data-parsley-validate="" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="billing_name" class="col-form-label">Full Name</label>
                    <input type="text" name="billing_name" class="form-control form-control-lg" placeholder="Enter your Fullname" required>
                </div>
                <div class="form-group">
                    <label for="billing_email" class="col-form-label">Email</label>
                    <input type="text" name="billing_email" class="form-control form-control-lg" placeholder="E-mail Address" required>
                </div>
                <div class="form-group">
                    <label for="billing_address" class="col-form-label">Address</label>
                    <input type="text" name="billing_address" class="form-control form-control-lg" placeholder="Full Address" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="billing_city" class="col-form-label">City</label>
                            <input type="text" name="billing_city" class="form-control form-control-lg" placeholder="City" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="billing_province" class="col-form-label">Province</label>
                            <input type="text" name="billing_province" class="form-control form-control-lg" placeholder="Province" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="billing_city" class="col-form-label">Phone</label>
                            <input type="text" name="billing_phone" class="form-control form-control-lg" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="billing_province" class="col-form-label">Postal Code</label>
                            <input type="text" name="billing_province" class="form-control form-control-lg" placeholder="Postal Code" required>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-secondary"><b>Payment Method</b></h5>
            </div>
            <div class="col-5">
                <div class="cart">
                    <h6 class="col-form-label text-secondary">Cart {{ Cart::instance()->count() }} Item(s)</h6>
                    @foreach (Cart::content() as $product)
                        <div class="media">
                            <img src="{{ asset('storage/'.$product->model['image']) }}" class="cart-img img-thumbnail mr-2" height="100" width="100" alt="{{ $product->name }}">
                            <div class="media-body">
                                <h6 class="float-right">{{ 'Php '.number_format($product->price, 2) }}</h6>
                                <h6 class="mt-0">{{ $product->name }}</h6>
                                <ul class="list-unstyled">
                                    <li class="text-secondary"><small>Quantity x{{ $product->qty }}</small></li>
                                    <li class="m-b-10"><small>{{ $product->options['size'] }}</small></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <input type="text" name="coupon" class="form-control form-control-lg" placeholder="Coupon">
                <hr>
                <div class="price-total">
                    <div id="paypal-button"></div>
                    <ul class="list-unstyled">
                        <li class="m-b-10 text-secondary">Subtotal <span class="text-dark float-right">{{ 'Php '.Cart::subtotal() }}</span></li>
                        <li class="m-b-10 text-secondary">Shipping <span class="text-dark float-right">--</span></li>
                        <li class="m-b-10 text-secondary">Tax (12%) <span class="text-dark float-right">--</span></li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="text-secondary"><h5>Total <span class="text-dark float-right"><b>{{ 'Php '.Cart::total() }}</b></span></h5></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>

</div>

@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('/js/parsley.min.js') }}"></script>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AVcWH5znVI63VthWq51rtT99I8kVC3gjZSkz89WC3u4odBlXXwxaoeqFXiR8ID910WIh-UEDYH491ymF',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '0.01',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
@endsection

@endsection
