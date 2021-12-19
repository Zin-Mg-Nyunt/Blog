<x-layout>
    <x-slot name='title'>
        <title>{{ $blog->title }}</title>
    </x-slot>
        <h1>{{ $blog->title }}</h1>
        <div>
            <p>Published at -{{ $blog->created_at->diffForHumans() }}</p>
            <p>{!! $blog->body !!}</p>
        </div>
        <a href="/">go back</a>
</x-layout>



