@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container m-t-150">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h3>LiveXtreme</h3>
            </div>

            <div class="form-group row m-t-50">
                <div class="col-md-8 offset-md-2">
                    <a href="{{ url('auth/facebook') }}" class="btn btn-primary btn-block">
                        <strong><small>LOG IN WITH FACEBOOK</small></strong>
                    </a>     
                </div>
            </div>

            <div class="text-center m-t-30">
                Or
            </div>

            <form method="POST" class="m-t-30" action="{{ route('register') }}" data-parsley-validate="">
                @csrf

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" required="" autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required="">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required="">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <input id="birthday" type="date" class="form-control" name="birthday" placeholder="Birthday" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <select name="country" id="country" class="custom-select" required="">
                            <option>Select Country</option>
                            @foreach ($countries as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">
                        <select name="gender_id" id="gender" class="custom-select" required="">
                            <option>Select Gender</option>
                            @foreach ($genders as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="subscription-box text-center">
                    <h6 class="text-secondary">
                        <input type="hidden" name="subscribed" id="field_results">
                        <input type="checkbox" class="m-r-15" value="1"> <small>Sign up for emails to hear all the latest from liveXtreme.</small>
                    </h6>
                </div>

                <br>

                <div class="terms-box text-center">
                    <h6 class="text-secondary">
                        <small>By creating an account, you agree to LiveXtreme's <a href="#" class="text-secondary" style="text-decoration: underline;">Privacy Policy</a> and <a href="#" class="text-secondary" style="text-decoration:underline;">Terms of Use</a></small>
                    </h6>
                </div>

                <div class="form-group row mb-0 m-t-30">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-dark btn-block">
                            <small>{{ __('CREATE ACCOUNT') }}</small>
                        </button>
                    </div>
                </div>
            </form>

            <br>

            <div class="already-member text-center">
                <h6 class="text-secondary"><small>Already a member? <a href="{{ route('login') }}" class="text-secondary" style="text-decoration: underline;">Sign in</a></small></h6>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $checks = $(":checkbox");
        $checks.on('change', function() {
            var string = $checks.filter(":checked").map(function(i,v){
                return this.value;
            }).get().join(" ");
            $('#field_results').val(string);
        });
    });
</script>
@endsection

@endsection
