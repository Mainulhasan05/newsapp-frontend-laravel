<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">

    <meta name="description" content="Kawsar News Portal Description">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('ogTitle', 'Your News Portal')">
    <meta property="og:description" content="@yield('ogDescription', 'Latest news and updates')">
    <meta property="og:url" content="@yield('ogUrl', request()->fullUrl())">
    <meta property="og:image" content="@yield('ogImage', asset('path/to/default/image.jpg'))">
    <meta property="og:type" content="article">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="@yield('twitterTitle', 'Your News Portal')">
    <meta name="twitter:description" content="@yield('twitterDescription', 'Latest news and updates')">
    <meta name="twitter:url" content="@yield('twitterUrl', request()->fullUrl())">
    <meta name="twitter:image" content="@yield('twitterImage', asset('path/to/default/image.jpg'))">
    <meta name="twitter:card" content="summary_large_image">

    <!-- SEO Meta Tags -->
    <meta name="keywords" content="news, updates, articles, Laravel">
    <meta name="author" content="Your Name">
    <title>@yield('title')</title>

    <link href={{ asset('img/favicon.ico') }} rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small"
                                href="#">{{ \Carbon\Carbon::now()->format('l, F j, Y') }}
                            </a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Advertise</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="{{ url('/contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="{{ url('login') }}">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#">
                                @if (session()->get('lang') != 'bangla')
                                    <small class="text-white fw-bold">
                                        <a href="{{ route('lang.english') }}">English</a>
                                    </small>
                                @else
                                    <small class="text-white fw-bold">
                                        <a href="{{ route('lang.bangla') }}">
                                            Bangla
                                        </a>
                                    </small>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small
                                    class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center bg-white py-3 px-lg-5">

            <div>
                <a href="{{ url('/') }}" class="navbar-brand p-0 text-center mb-3"
                    style="
                    margin-left: 150px;
                ">
                    <img class="img-fluid" width="250" height="80" src="{{ asset('/img/logo.png') }}"
                        alt="">
                </a>
                <p class="text-center">
                    ঢাকা, ১৮ এপ্রিল ২০২৪, বৃহস্পতিবার, ৫ বৈশাখ ১৪৩১ বঙ্গাব্দ, ৮ শাওয়াল ১৪৪৫ হিঃ
                </p>

            </div>
            {{-- </div> --}}
            {{-- <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
            </div> --}}
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="/" class="navbar-brand text-center d-block d-lg-none">
                <img width="200" height="80" src="{{ asset('/img/logo.png') }}" alt="">
                {{-- <h1 class="m-0 display-4 text-uppercase text-primary">Kawsar<span class="text-white font-weight-normal">News</span></h1> --}}
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    {{-- <a href="category.html" class="nav-item nav-link">Category</a>
                    <a href="single.html" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div> --}}
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>

                    @foreach ($categories as $category)
                        <a href="{{ url('/category/' . $category->slug) }}"
                            class="nav-item nav-link">{{ $category->name }}</a>
                    @endforeach
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @yield('banner')
    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="text-white">
                    যোগাযোগ: <br>
                    ইমেইল: songbadzog@gmail.com
                </p>
                <br><br>
                <p class="text-white">
                    মোবাইল: <br>
                    ০১৭১১-৫১২২৫০, ০১৭১২-০২৭৩৩৩
                    ০১৭০৯-৭৮৭৭২২
                </p>
                {{-- <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Sector 7 Uttara, Dhaka</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+880 1709-787722</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@kawsar.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6> --}}
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                {{-- show some dynamic url, like sompadoker kotha --}}
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">আর্কাইভ</h5>
                <p><a href="{{ url('/pages/sompadoker-kotha') }}">সম্পাদকের কথা</a></p>
                <p><a href="{{ url('/pages/nirbahi-sompadoker-kotha') }}">নির্বাহী সম্পাদকের কথা</a></p>
                <p><a href="{{ url('/pages/contact') }}">যোগাযোগ</a></p>
                <p><a href="{{ url('/login') }}">রিপোর্টার লগইন</a></p>
                <p><a href="{{ route('guest.form') }}">আমাদের লিখুন</a></p>

                
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    @foreach ($categories as $category)
                        <a href="{{ url('/category/' . $category->slug) }}"
                            class="btn btn-sm btn-secondary m-1">{{ $category->name }}</a>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5" style="color:white">
                প্রধান উপদেষ্টা: সাজ্জাদ আলম খান তপু <br>
                উপদেষ্টা সম্পাদক: মোঃ আনোয়ারুল হক <br>
                প্রকাশক ও প্রধান সম্পাদক: মোহাম্মদ আজিজুল মজিদ কাজল <br>
                ভারপ্রাপ্ত সম্পাদক: ইকবাল হাসান কাজল <br>
                নির্বাহী সম্পাদকঃ কে.এম কাউছার কারাইজ <br>
                ব্যবস্হাপনা সম্পাদক: মৃণালকান্তি দাস <br>
                বার্তা সম্পাদক: বশির আহমেদ ফারুক <br>
                সহ বার্তা সম্পাদক: মহসীন খান হীরা <br>
                <br>

                প্রধান কার্যালয়ঃ <br>
                বাড়ি নম্বর- ১৬৩, ৫ম তলা, রোড নম্বর - ৩, সি ব্লক, ইস্টার্ন <br>
                হাউজিং, মিরপুর, ঢাকা। <br><br>

                বার্তা ও বাণিজ্যিক কার্যালয়: <br> হাজী জমির উদ্দিন খাঁন সুপার
                মার্কেট, ঘিওর উপজেলা সদর, ঘিওর, মানিকগঞ্জ।

                {{-- <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5> --}}
                {{-- <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Kawsar News</a>. All Rights Reserved.



    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    @yield('script')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset("js/tinymce/tinymce.min.js")}}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>

</body>

</html>
