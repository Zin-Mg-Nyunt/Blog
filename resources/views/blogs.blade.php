<x-layout> 
    <x-slot name='title'> 
        <title>All Blogs</title>
    </x-slot>
    @foreach($blogs as $blog)
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->slug }}"> {{  $blog->title }} </a></h1>
            <a href="/categories/{{ $blog->category->slug }}">
                {{ $blog->category->name }}
            </a>
            <h4>Author - <a href="/users/{{ $blog->author->id }}">{{ $blog->author->name }}</a></h4>
            <div>
                <p>Published at - {{  $blog->created_at->diffForHumans() }}</p>
                <p>{{ $blog->intro }}</p>
                <p>Updated at - {{ $blog->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</x-layout>

