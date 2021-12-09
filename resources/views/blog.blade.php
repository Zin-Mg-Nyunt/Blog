@extends('layout')

@section('title')
    <title>{{ $blog->title }}</title>
@endsection

@section('contact')
    <h1>{{ $blog->title }}</h1>
    <div>
        <p>Published at -{{ $blog->date }}</p>
        <p>{!! $blog->body !!}</p>
    </div>
    <a href="/">go back</a>
@endsection



