<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="text-center">
                    <h3 class="m-t-30"><b>LiveXtreme</b></h3>
                </div>
                <div class="login m-t-30">
                    <form method="POST" data-parsley-validate="" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row m-t-30">
                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row m-t-30">
                            <div class="col-md-8 offset-md-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <small>
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label text-secondary" for="remember">
                                                    {{ __('Keep me logged in') }}
                                                </label>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        @if (Route::has('password.request'))
                                            <a class="text-secondary float-right" href="{{ route('password.request') }}">
                                                <small>{{ __('Forgot Your Password?') }}</small>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="terms text-center">
                            <h6 class="text-secondary">
                                <small>
                                    By logging in, you agree to LiveXtreme's <a href="#" class="text-secondary" style="text-decoration: underline;">Privacy Policy </a> and <br> <a href="#" class="text-secondary" style="text-decoration: underline;">Terms of Use</a>
                                </small>
                            </h6>
                        </div>

                        <br>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-dark btn-block">
                                    <small>{{ __('LOGIN') }}</small>
                                </button>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <a href="{{ url('auth/facebook') }}" class="btn btn-primary btn-block">
                                    <strong><small>LOG IN WITH FACEBOOK</small></strong>
                                </a>     
                            </div>
                        </div>
                    </form>

                    <br>

                    <div class="not-a-user text-center">
                        <h6 class="text-secondary"><small>Not a member? <a href="{{ route('register') }}" class="text-secondary" style="text-decoration: underline;">Join now</a></small></h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection