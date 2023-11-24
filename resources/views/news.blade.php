{{-- extend master layout --}}
@extends('layouts.master')
@section('title', $news->title)

@section('ogTitle', $news->title)
@section('ogDescription', $news->description)
<meta property="og:title" content="{{ $news->title }}">
    <meta property="og:description" content="{{ $news->description }}">
    <meta property="og:image" content="{{ env('BACKEND_URL') }}/storage/{{ $news->image }}">
{{-- 
@section('ogUrl', route('news.show', $news->slug))
@section('ogImage', '{{env("BACKEND_URL")}}/storage/{{$news->image}}') --}}

@section('twitterTitle', $news->title)
@section('twitterDescription', $news->excerpt)
@section('twitterUrl', route('news.show', $news->slug))
@section('twitterImage', '{{env("BACKEND_URL")}}/storage/{{$news->image}}')
    {{-- page title --}}
    
    {{-- page content --}}
    @section('content')
    <body>
        
    
    
    
    
        <!-- Breaking News Start -->
        <div class="container-fluid mt-5 mb-3 pt-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div class="section-title border-right-0 mb-0" style="width: 180px;">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                            </div>
                            <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                                style="width: calc(100% - 180px); padding-right: 100px;">
                                <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                                <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breaking News End -->
    
    
        <!-- News With Sidebar Start -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- News Detail Start -->
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{env("BACKEND_URL")}}/storage/{{$news->image}}" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-3">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">Business</a>
                                    <a class="text-body" href="">
                                                                          <small>{{ $news->created_at->format('d M, Y') }}</small>
                                        
                                        <small>
                                            <i class="far fa-clock ml-2 mr-1"></i>{{ $news->created_at->format('h:i A') }}
                                        </small>
                                    </a>
                                </div>
                                <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{$news->title}}</h1>
                                <p>{!!$news->description!!}</p>
                                
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                    <span>John Doe</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="ml-3"><i class="far fa-eye mr-2"></i>{{$news->views}}</span>
                                    <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                                </div>
                            </div>
                        </div>
                        <!-- News Detail End -->
    
                        <!-- Comment List Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-4">
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                            accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                        <div class="media mt-4">
                                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                                style="width: 45px;">
                                            <div class="media-body">
                                                <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                                    labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                                    eirmod ipsum.</p>
                                                <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Comment List End -->
    
                        <!-- Comment Form Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-4">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave a comment"
                                            class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Comment Form End -->
                    </div>
    
                    <div class="col-lg-4">
                        <!-- Social Follow Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">
                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                    <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">12,345 Fans</span>
                                </a>
                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                    <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">12,345 Followers</span>
                                </a>
                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                    <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">12,345 Connects</span>
                                </a>
                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                    <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">12,345 Followers</span>
                                </a>
                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                    <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">12,345 Subscribers</span>
                                </a>
                                <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                    <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">12,345 Followers</span>
                                </a>
                            </div>
                        </div>
                        <!-- Social Follow End -->
    
                        <!-- Ads Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                            </div>
                            <div class="bg-white text-center border border-top-0 p-3">
                                <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- Ads End -->
    
                        <!-- Popular News Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">

                                @foreach ($trending_news as $news)
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    {{-- <img class="img-fluid" src="{{env("BACKEND_URL")}}/storage/{{$news->image}}" alt=""> --}}
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                                            <a class="text-body" href=""><small>
                                                {{ $news->created_at->format('d M, Y') }}
                                                </small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{$news->title}}</a>
                                    </div>
                                </div>
                                @endforeach
                                    
                                
                            </div>
                        </div>
                        <!-- Popular News End -->
    
                        <!-- Newsletter Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                            </div>
                            <div class="bg-white text-center border border-top-0 p-3">
                                <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                                <div class="input-group mb-2" style="width: 100%;">
                                    <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                    </div>
                                </div>
                                <small>Lorem ipsum dolor sit amet elit</small>
                            </div>
                        </div>
                        <!-- Newsletter End -->
    
                        <!-- Tags Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">
                                <div class="d-flex flex-wrap m-n1">
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                                </div>
                            </div>
                        </div>
                        <!-- Tags End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- News With Sidebar End -->
    
    
        <!-- Footer Start -->
        <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
            <div class="row py-4">
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                    <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                    <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                    <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                    <div class="mb-3">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                            <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                        </div>
                        <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                            <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                        </div>
                        <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                    </div>
                    <div class="">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                            <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                        </div>
                        <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                    <div class="m-n1">
                        <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Entertainment</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Travel</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Lifestyle</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                        <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                    <div class="row">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
            <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. 
            
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
        <!-- Footer End -->
    
    
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    
    
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
    @endsection