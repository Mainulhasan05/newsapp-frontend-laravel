@extends('layouts.master')
@section('title')
    @if($page->title)
        {{ $page->title }}
    @else
        Pages
    @endif
@endsection

@section('content')
    <h1>{{ $page->title }}</h1>
    <br>
    {{-- show image --}}
    @if($page->image)
        <img src="{{ asset('storage/pages/'.$page->image) }}" alt="{{ $page->title }}" class="img-fluid">
    @endif
{!! $page->description !!}

@endsection