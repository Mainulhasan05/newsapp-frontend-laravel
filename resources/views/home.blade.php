{{-- extend master layout --}}
@extends('layouts.master')

    {{-- page title --}}
    @section('title', 'News24')
    {{-- page content --}}
    @section('content')
        <h1>Home</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
    @endsection
    {{-- page footer --}}
    @section('footer')
        @parent
        <p>Home page footer</p>

    
@endsection