@extends('layouts.master')
@section('ogImage', asset('/img/logo.png'))
@section('ogTitle', 'সংবাদ যোগ: সর্বশেষ খবর, নতুন সংবাদ, এবং বিস্তারিত প্রতিবেদন')
@section('ogDescription', 'Stay updated with the latest news, breaking stories, and detailed reports. Your go-to source for news from Bangladesh.')



@section('content')

<div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 170px); padding-right: 90px;">
                        <marquee>
        
                            {{-- @foreach ($featured_news as $news)
                                <div class="text-truncate">
                                    <a class="text-white text-uppercase font-weight-semi-bold" href="{{ route('news.show', ['slug' => $news->slug]) }}">
                                        @if (session()->get('lang') != 'bangla')
                                            {{ $news->title_bn }}
                                        @else
                                            {{ $news->title_en }}
                                        @endif
                                    </a>
                                </div>
                            @endforeach --}}
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->

<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            <!-- Iterate over the featured news from your controller -->
            @foreach ($featured_news as $news)
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <a href="{{ route('news.show', ['slug' => $news->slug]) }}">
                        <img class="img-fluid h-100" src="{{ env('BACKEND_URL') }}/images/{{ $news->image }}" style="object-fit: cover;">
                    </a>
                    <div class="">
                        <div class="mb-2">
                            <!-- Display category name -->
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $news->category->name ?? 'Uncategorized' }}</a>
                            <!-- Display news date -->
                            <a class="text-white" href=""><small>{{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}</small></a>
                        </div>
                        <!-- Display news title -->
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('news.show', ['slug' => $news->slug]) }}">
                            @if (session()->get('lang') != 'bangla')
                                {{ $news->title_bn }}
                            @else
                                {{ $news->title_en }}
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featured News Slider End -->

<!-- Latest News Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <!-- Iterate over the latest news from your controller -->
                    @foreach ($latest_news as $news)
                        <div class="col-lg-4">
                            <div class="position-relative mb-3">
                                <a href="{{ route('news.show', ['slug' => $news->slug]) }}">
                                    <img class="img-fluid" src="{{ env('BACKEND_URL') }}/images/{{ $news->image }}" style="object-fit: cover;">
                                </a>
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <!-- Display category name -->
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $news->category->name ?? 'Uncategorized' }}</a>
                                        <!-- Display news date -->
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}</small></a>
                                    </div>
                                    <!-- Display news title -->
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news.show', ['slug' => $news->slug]) }}">{{ $news->title_bn }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest News End -->


<div class="container-fluid">
    <div class="container">
        @foreach ($parentCategoriesWithNews as $category)
            @if ($category->posts->isNotEmpty()) <!-- Check if the category has any associated news -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{ $category->name }}</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    @foreach ($category->posts as $news)
                        <div class="col-lg-4">
                            <div class="position-relative mb-3">
                                <a href="{{ route('news.show', ['slug' => $news->slug]) }}">
                                    <img class="img-fluid" src="{{ env('BACKEND_URL') }}/images/{{ $news->image }}" style="object-fit: cover;">
                                </a>
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        @if ($news->category) <!-- Check if the news item has a category -->
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $news->category->name }}</a>
                                        @endif
                                        <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('news.show', ['slug' => $news->slug]) }}">{{ $news->title_bn }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>


@endsection
