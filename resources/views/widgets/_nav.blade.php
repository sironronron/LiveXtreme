<div id="snav" class="fixed-top">
    <nav class="navbar navbar-expand-md navbar-light navbar-top">
        <div class="collapse navbar-collapse m-l-15 m-r-15">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#">
                        <img src="{{ asset('images/logo/aus.svg') }}" width="20" alt="ausFlag">
                    </a>
                </li>
                <li class="nav-item block m-l-15 m-r-15">
                    <span class=""></span>
                </li>
                 <li class="nav-item">
                    <a href="#">
                        <img src="{{ asset('images/logo/phFlag.svg') }}" width="20" alt="phflag">
                    </a>
                </li>
                <li class="nav-item block m-l-15 m-r-15">
                    <span class=""></span>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <img src="{{ asset('images/logo/cn.svg') }}" width="20" alt="chinaFlag">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item m-t-3">
                        <a href="#" class="login-text text-secondary" data-toggle="modal" data-target="#loginModal">
                            <strong>Join / Log-in</strong> to LiveXtreme
                        </a>
                    </li>
                @else
                    <li class="nav-item m-t-3 dropdown">
                        <a id="navbarDropdown" href="#" class="login-text text-secondary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user m-r-7"></i> My Account <small><i data-feather="chevron-down" height="10" width="10"></i></small>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('profile.index') }}" class="dropdown-item">
                                <small>{{ __('Account') }}</small>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <small>{{ __('Logout') }}</small>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
                
                <li class="nav-item m-l-15">
                    <a href="{{ route('cart.index') }}" class="text-secondary">
                        <div>
                            <small><span data-feather="shopping-cart" style="width: 20; height: 20"></span></small>
                            @if (Cart::count() != 0)
                                <span class="cart-items-count"><span class="notification-counter">{{ Cart::instance()->count() }}</span></span>
                            @endif
                        </div>
                    </a>
                </li>
                <li class="nav-item m-l-15 m-r-15 m-t-3">
                    <a href="#" class="text-secondary">
                        Contact Us
                    </a>
                </li>
                <li class="nav-item m-t-3">
                    <a href="#" class="text-secondary">
                        Help <span data-feather="help-circle" style="width: 15; height: 15;"></span>
                    </a>
                </li>         
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel border-bottom">
        <a class="navbar-brand m-l-15" href="{{ url('/') }}">
            LiveXtreme 
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item block m-l-15 m-r-10">
                    <span class=""></span>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item dropdown full-width m-l-15">
                        <a id="navbarDropdown" href="#" class="login-text text-secondary dropdown-toggle drodown-cat-item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ $category->name }} <small><i data-feather="chevron-down" height="10" width="10"></i></small>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right border-top border-bottom cat-dropdown" aria-labelledby="navbarDropdown">
                            <div class="row m-l-15 m-r-15">
                                @foreach ($category->subcategory as $subcategory)
                                    <div class="col-2">
                                        <a href="{{ route('cat.show', ['id' => $subcategory->id, 'slug' => $subcategory->slug]) }}" class="dropdown-item dropdown-cat-item border-bottom">
                                            <small><b>{{ $subcategory->name }}</b></small>
                                        </a>
                                        @foreach ($subcategory->subclassifications as $subclass)
                                            <a href="{{ route('subclass.show', ['id' => $subclass->id, 'slug' => $subclass->slug, 'subSlug' => $subclass->subcategory->slug]) }}" class="dropdown-item dropdown-cat-item">
                                                <small>{{ $subclass->name }}</small>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <ul class="navbar-nav ml-auto">
                <form class="form-inline input-group" action="{{ route('search') }}" method="GET">
                    <input class="form-control form-search-input" type="search" name="queue" autocomplete="off" placeholder="Search" aria-label="Search">
                    <div class="input-group prepend">
                        <button class="btn btn-outline-secondary search-button" type="button" id="button-addon1"><span data-feather="search" width="20" height="20"></span></button>
                    </div>
                </form>
            </ul>
        </div>
    </nav>
</div>