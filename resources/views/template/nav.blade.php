<nav class="navbar navbar-expand-md  shadow-sm" style="background-color: black !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('storage/images/logo2.jpg') }}" alt="{{ config('app.name', 'Laravel') }}"
                 style="margin-top: -14px !important; margin-bottom: -13px !important; margin-left: -30px!important;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">@fas('home') {{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">@fas('globe') {{ __('Our Services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">@fas('info') {{ __('Why Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">@fas('info-circle') {{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@fas('blog') {{ __('Blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">@fas('phone') {{ __('Contact Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@fas('sign-in-alt') {{ __('Sign In') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">@fas('user-plus') {{ __('Sign Up') }}</a>
                        </li>
                    @endif
                @else
                    @if(auth()->user()->level == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">@fas('users-cog') Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homes.index') }}">@fas('building') Houses</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('testimony.index') }}">
                            @fas('quote-left') Testimonials</a>
                         </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.index') }}">@fas('newspaper') News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reports') }}">@fas('file-alt') Reports</a>
                        </li>
                        @elseif(auth()->user()->level == 'Agent')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homes.index') }}">Houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Booked</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reports</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">Vacant Houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Booked houses</a>
                        </li>
                        @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
