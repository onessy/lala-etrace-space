<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        fieldset {
            -webkit-border-radius: 8px !important;
            -moz-border-radius: 8px !important;
            border-radius: 8px !important;
        }
        .nav-link
        {
            color: white !important;
        }
        .nav-link:hover
        {
            color: yellow !important;
            margin-top: 7px !important;
            font-weight: bold !important;
        }

        .h5
        {
            font-weight: bold;
        }

        .new
        {
            border-bottom: 1px  #0000EE;
            margin-top: 2px !important;
            margin-bottom: 5px !important;
        }
        .card-link:hover
        {
            color: yellowgreen !important;
        }
        .home
        {
            padding: 4px !important;
            font-family: "Times New Roman", fantasy;
            font-size: 16px !important;
        }
        .info
        {
            padding: 4px !important;
            font-family: "Times New Roman", monospace ;
            font-size: 16px !important;
        }
        .crop-text-2 {
            -webkit-line-clamp: 7;
            overflow : hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
        .crop-text-3 {
            -webkit-line-clamp: 3;
            overflow : hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 250px auto;
            grid-template-rows: auto auto;
        }
        .quick-links {
            grid-column: 1/1;
            grid-row: 1;
        }

        .slider {
            grid-column: 2/3;
            grid-row: 1;
        }
        .other
        {
            grid-column: 1/3;
            grid-row: 2;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: black !important;">
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
<div class="grid-container">
<div class="quick-links">
        <div class="container-fluid">
            <li class="list-unstyled">
                <div class="nav-item">
                    <a class="card-link" href="#" style="border-bottom: 1px;">Apartment</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">1 Bedroom</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">2,3 Bedroom</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">Bedsitter</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">Single</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">Hostel</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">Guest House</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">Business Halls</a>
                </div>
                <hr class="new">
                <div class="nav-item">
                    <a class="card-link" href="#" style="">Other</a>
                </div>
                <hr class="new">
            </li>
        </div>
    </div>
    <div class="slider">
    <div id="carouselExampleFade" class="carousel slide carousel-fade w-100" data-ride="carousel" data-interval="2500">
                @if(count($home) > 0)
                    <div class="carousel-inner">
                        @foreach($home->take(7) as $data)
                            <div class="carousel-item @if($loop->first) active @endif ">
                                <img src="{{url('/storage/images/', $data->cover_image)}}" class="d-block w-100"
                                     alt="{{ $data->title }}" style="max-height: 350px; min-height: 350px;">
                                <div class="carousel-caption @if($loop->first) active @endif">
                                    <h3 class="text-capitalize" style="color: red;"> {{ $data-> name }} </h3>
                                    <p class="lead" style="color: green;"> {{ $data->desc }} </p>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <p>No priority one house images added.</p>
                    </div>
                @endif

                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </div>
    <hr>
    <div class="other">
        <div class="container-fluid" style="padding-top: 15px !important;">
            <h5 class="h5 mt-0 text-center">priority 2</h5>
            <div class="card-deck">
                @if(count($home) > 0)
                    @foreach($home->take(4) as $home)
                        <div class="col-md-3 col-sm-3">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ url('/storage/images/', $home->cover_image) }}"
                                     alt="Card image cap" style="height: 150px !important;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $home->name }}</h5>
                                    <p class="card-text">{{ $home->location }} | Ksh. {{ $home->rent }}</p>
                                    <a href="#" class="btn btn-sm btn-warning float-right">@fas('eye') view</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="muted">no houses</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="container-fluid" style="padding-top: 15px !important;">
            <h5 class="h5 mt-0 text-center">priority 3</h5>
            <div class="card-deck">
                @if(count($home1) > 0)
                    @foreach($home1->take(4) as $p3)
                        <div class="col-md-3 col-sm-3">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ url('/storage/images/', $p3->cover_image) }}"
                                     alt="Card image cap" style="height: 150px !important;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p3->name }}</h5>
                                    <p class="card-text">{{ $p3->location }} | Ksh. {{ $p3->rent }}</p>
                                    <a href="#" class="btn btn-sm btn-warning float-right">@fas('eye') view</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="muted">no houses</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="container-fluid" style="padding-top: 15px !important;">
            <h5 class="h5 mt-0 text-center">priority 4</h5>
            <div class="card-deck">
                @if(count($home1) > 0)
                    @foreach($home1->take(4) as $p3)
                        <div class="col-md-3 col-sm-3">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ url('/storage/images/', $p3->cover_image) }}"
                                     alt="Card image cap" style="height: 150px !important;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p3->name }}</h5>
                                    <p class="card-text">{{ $p3->location }} | Ksh. {{ $p3->rent }}</p>
                                    <a href="#" class="btn btn-sm btn-warning float-right">@fas('eye') view</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="muted">no houses</p>
                @endif
            </div>
        </div>
        <hr>
        <div class="container-fluid" style="padding-top: 15px !important;">
            <h5 class="h5 mt-0 text-center">priority 5</h5>
            <div class="card-deck">
                @if(count($home1) > 0)
                    @foreach($home1->take(4) as $p3)
                        <div class="col-md-3 col-sm-3">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ url('/storage/images/', $p3->cover_image) }}"
                                     alt="Card image cap" style="height: 150px !important;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p3->name }}</h5>
                                    <p class="card-text">{{ $p3->location }} | Ksh. {{ $p3->rent }}</p>
                                    <a href="#" class="btn btn-sm btn-warning float-right">@fas('eye') view</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="muted">no houses</p>
                @endif
            </div>
        </div>
        <hr>
        <div id="services" class="container-fluid" style="padding-top: 15px !important;">
            <h5 class="h5 mt-0 text-center">Our Services</h5>
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">1. Renting & Reservation.</h5>
                        <p class="card-text crop-text-2">
                            Find, Locate and pay for your desired accommodation facility efficiently.<br>
                            Lala espace trace Management Ltd is an E-Commerce platform, that provides among other services,
                            convenient access to accommodation facilities in Kenya that you can either rent or buy.<br>
                            They include houses with 3 Bedrooms, 2 Bedrooms or 1 Bedroom houses, Offices and Business Spaces.<br>
                            We also have a wide array of Bedsitters, Single rooms, Boys or Girls Hostels and also Hotel Rooms/Guest
                            Houses that are clean, spacious and will meet your needs.<br>

                            All these can be found by conducting a Search Here where you can Locate, Reserve and Pay your deposit and
                            rent efficiently and occupy the space as soon as you can relocate. After tenancy cleaning services after
                            a tenant vacates guarantees clean conditions for the next occupant.<br>
                            All these are designed to:<br>
                            1)	Save you on time previously spent locating favorable accommodation/Business facilities.<br>
                            2)	Reduce the costs incurred while physically searching and securing of suitable facilities or spaces.<br>
                            3)	Guarantee you safety in money transactions while securing these facilities/spaces.<br>
                            Hence Increasing efficiency, reliability, and convenience in the entire process of locating and securing your
                            desired accommodation facility.<br>
                            This is our value and promise we make to you our esteemed customer!<br>
                            Feel free to Contact Us for more information or inquiries.<br></p>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#renting"
                           title="read more about this service">@fas('eye') more...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">2. Relocation.</h5>
                        <br>
                        <p class="card-text crop-text-2">
                            We offer affordable transport/Moving services of your luggage to your desired destination all
                            over the country.<br>
                            Feel free to Contact Us for more information or inquiries.<br></p>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#relocation"
                           title="read more about this service">@fas('eye') more...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">3. Cleaning.</h5><br>
                        <p class="card-text crop-text-2">
                            We offer Janitorial/Cleaning and Maintenance Services of Commercial, Residential and
                            Educational facilities while observing Sanitation, Health & Safety standards and
                            regulations.<br>
                            Feel free to Contact Us for more information or inquiries.<br></p>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#cleaning"
                           title="read more about this service">@fas('eye') more...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">4. Repairs.</h5><br>
                        <p class="card-text crop-text-2">
                            We partner with renowned repair and renovation technicians and service companies to offer you
                            affordable and reliable repair & renovation services at your request.<br>
                            Services include Electrical, Woodwork, Painting and Plumbing repair and installations.<br>
                            Feel free to Contact Us for more information or inquiries.<br></p>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#repairs"
                           title="read more about this service">@fas('eye') more...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">5. Supply of Goods.</h5><br>
                        <p class="card-text crop-text-2">We supply and deliver superior goods that fulfill and satisfy our customers'
                            specifications. You can also make a Bulk Purchase order by clicking here.<br>
                            The goods supplied include but are not limited to Consumables and Supplies.<br>
                            Delivery includes to local Public, Private Institutions, through courier services
                            and also to overseas destinations.<br>
                            Feel free to Contact Us for more information or inquiries.<br>
                        </p>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#supply"
                           title="read more about this service">@fas('eye') more...</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div id="about" class="container-fluid" style="padding-top: 15px !important;">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h5 class="h5 mt-0 text-center">About us</h5>
                    <hr class="new">
                    <p class="text-left">
                        We are a fast-growing customer service-oriented company that is singularly dedicated to your
                        satisfaction.
                    </p>

                    <h5 class="h5 mt-0 text-center">Our Vision</h5>
                    <hr class="new">
                    <p class="text-left">
                        Exemplary delivery of Quality services and goods in an innovative, cost-effective and reliable manner.
                    </p>
                    <h5 class="h5 mt-0 text-center">Our Mission</h5>
                    <hr class="new">
                    <p class="text-left">
                        To be the most preferred brand and one-stop-shop for our esteemed clients in delivering quality
                        services and goods while embracing Integrity, ethics and Professionalism.
                    </p>
                    <h5 class="h5 mt-0 text-center">Our Mission</h5>
                    <hr class="new">
                    <p class="text-center">
                        The Company’s Goals include:
                    </p>
                    <ol>
                        <li>
                            Delivery of superior goods and services that meet our customers specifications.
                        </li>
                        <li>
                            Exemplary client service aimed at customer satisfaction.
                        </li>
                        <li>
                            Continuously innovating and learning to improve on our Value delivery.
                        </li>
                        <li>
                            Flourish and thrive together with our esteemed clients by having a robust and
                            accountable organizational structure.
                        </li>
                    </ol>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h5 class="h5 mt-0 text-center">Why us</h5>
                    <hr class="new">
                    <p>
                        YOU’RE IN GOOD HANDS ALREADY...
                    </p>
                    <p>
                        Our Services are designed to:
                    </p>
                    <ol>
                        <li>
                            Save you on time. (ICON)
                        </li>
                        <li>
                            Reduce costs. (ICON)
                        </li>
                        <li>
                            Guarantee Fast National and International Shipping & Delivery. (ICON)
                        </li>
                        <li>
                            Offer you a Return Policy and a 100% Money back Guarantee. (ICON)
                        </li>
                        <li>
                            Offer you Bulk Purchases where you can get Great Discounts. (ICON)
                        </li>
                        <li>
                            Guarantee you Safety in money transactions. (ICON)
                        </li>
                    </ol>
                    <p class="text-left">
                        We have a team of dynamic, innovative and motivated individuals who are highly resourceful and understands your needs, then goes an extra mile to ensure your satisfaction, continued fulfillment and a wholesome experience of convenience; which we take great pride in. This way, value is delivered and it shines through our products and services.  -See testimonials.
                        We define a Team as the functional unit of operation.
                        We therefore adopt a T.E.A.M work approach where Together Everyone Achieves More.

                        Welcome and enjoy the EspaceTrace Advantage!
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid" style="padding-top: 15px !important;">
            <h5 class="h5 mt-0 text-center">Testimonials</h5>
            <div class="card-deck">
                @if(count($testimony)>0)
                    @foreach($testimony->take(3) as $data)
                        <div class="col-md-4 my2">
                            <div class="card mb-3 h-100 justify-content-center" style="font-family: 'Times New Roman', serif;">
                                <div class="row no-gutters">
                                    <div class="col-md-3 col-sm-3">
                                        <img class="rounded-circle mx-auto d-block" src="{{ url('/storage/images/', $data->cover_image) }}"
                                             style="height: 100px !important; width: 100px !important;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-capitalize">{{ $data->name }}</h5>
                                            <p class="card-text font-italic crop-text-3"> {{ $data->body }}.</p>
                                            <p class="card-text"><small class="text-muted">{{ $data->created_at->diffForHumans() }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">
                        no testimonials yet added.
                    </p>
                @endif
            </div>
        </div>
        <hr>
        </div>
    <footer id="footer" class="page-footer font-small unique-color-dark w-100"
            style="background-color: rgba(0,0,0,0.5); margin-bottom: 0; position: absolute;">

        <div style="background-color: rgba(0,0,0,0.1);">
            <div class="container">

                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">

                        <form class="input-group">
                            <span style="color: white; margin-right: 7px !important;">subscribe: </span>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="enter email to get updates" aria-label="Your email"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-outline-white my-0" type="button">Sign up</button>
                            </div>
                        </form>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right" style="color: white;">
                        <span style="margin-right: 5px !important;">follow us: </span>
                        <a class="wp-ic">
                            @fab('whatsapp')
                        </a>
                        <!-- Facebook -->
                        <a class="fb-ic" style="margin-left: 18px;">
                            @fab('facebook')
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic" style="margin-left: 18px;">
                            @fab('twitter')
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic" style="margin-left: 18px;">
                            @fab('instagram')
                        </a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
        </div>
        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 h-100" style="color: white;">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>@fas('building') New York, NY 10012, US</p>
                    <p>@fas('mail-bulk') info@example.com</p>
                    <p>@fas('phone') + 01 234 567 88</p>
                    <p>@fas('phone') + 01 234 567 89</p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4 h-100" style="color: white;">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Quick links</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="{{ url('/') }}" style="color: white;">Home</a>
                    </p>
                    <p>
                        <a href="#about" style="color: white;">Our Service & About us</a>
                    </p>
                    <p>
                        <a href="#" style="color: white;">Blog</a>
                    </p>
                    <p>
                        <a href="{{ url('login') }}" style="color: white;">Login</a> | <a href="{{ url('register') }}" style="color: white;">Find house</a> | <a href="{{ url(('/register1')) }}" style="color: white;">List with us</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 col-xl-5 mx-auto mb-4 h-100" style="color: white;">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Our offices</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <div style="height: 250px;">
                        {!! Mapper::render() !!}
                    </div>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="color: white;">© 2018 Copyright: espace Trade Ltd</div>
        <!-- Copyright -->

    </footer>
        </div>
<!-- Modal -->
<div class="modal fade" id="renting" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">1. Renting & Reservation.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Find, Locate and pay for your desired accommodation facility efficiently.<br>
                Lala espace trace Management Ltd is an E-Commerce platform, that provides among other services,
                convenient access to accommodation facilities in Kenya that you can either rent or buy.<br>
                They include houses with 3 Bedrooms, 2 Bedrooms or 1 Bedroom houses, Offices and Business Spaces.<br>
                We also have a wide array of Bedsitters, Single rooms, Boys or Girls Hostels and also Hotel Rooms/Guest
                Houses that are clean, spacious and will meet your needs.<br>

                All these can be found by conducting a Search Here where you can Locate, Reserve and Pay your deposit and
                rent efficiently and occupy the space as soon as you can relocate. After tenancy cleaning services after
                a tenant vacates guarantees clean conditions for the next occupant.<br>
                All these are designed to:<br>
                <ol>
                    <li>
                        Save you on time previously spent locating favorable accommodation/Business facilities.<br>
                    </li>
                    <li>
                        Reduce the costs incurred while physically searching and securing of suitable facilities
                        or spaces.<br>
                    </li>
                    <li>
                        Guarantee you safety in money transactions while securing these facilities/spaces.<br>
                        Hence Increasing efficiency, reliability, and convenience in the entire process of locating
                        and securing your desired accommodation facility.<br>
                    </li>
                </ol>

                This is our value and promise we make to you our esteemed customer!<br>
                Feel free to Contact Us for more information or inquiries.<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="relocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">2. Relocation.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                We offer affordable transport/Moving services of your luggage to your desired destination all
                over the country.<br>
                Feel free to Contact Us for more information or inquiries.<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cleaning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">3. Cleaning.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                We offer Janitorial/Cleaning and Maintenance Services of Commercial, Residential and
                Educational facilities while observing Sanitation, Health & Safety standards and
                regulations.<br>
                Feel free to Contact Us for more information or inquiries.<br></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="repairs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">4. Repairs.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                We partner with renowned repair and renovation technicians and service companies to offer you
                affordable and reliable repair & renovation services at your request.<br>
                Services include Electrical, Woodwork, Painting and Plumbing repair and installations.<br>
                Feel free to Contact Us for more information or inquiries.<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="supply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">5. Supply of Goods.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                We supply and deliver superior goods that fulfill and satisfy our customers'
                specifications. You can also make a Bulk Purchase order by clicking here.<br>
                The goods supplied include but are not limited to Consumables and Supplies.<br>
                Delivery includes to local Public, Private Institutions, through courier services
                and also to overseas destinations.<br>
                Feel free to Contact Us for more information or inquiries.<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
