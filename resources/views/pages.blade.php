@extends('layouts.master')
@section('title')
    @if($page->title)
        {{ $page->title }}
    @else
        Pages
    @endif
@endsection

@section('content')
    <div class="container my-4">
        <h1>{{ $page->title }}</h1>
    <br>
    
    @if($page->image)
        <img src="{{ asset('storage/pages/'.$page->image) }}" alt="{{ $page->title }}" class="img-fluid">
    @endif
{!! $page->description !!}

    </div>

@endsection