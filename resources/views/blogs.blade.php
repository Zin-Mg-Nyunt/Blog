<x-layout> 
    <x-slot name='title'> 
        <title>All Blogs</title>
    </x-slot>

    @foreach($blogs as $blog)
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->id }}"> {{  $blog->title }} </a></h1>
            <div>
                <p>Published at - {{  $blog->date }}</p>
                <p>{{ $blog->intro }}</p>
            </div>
        </div>
    @endforeach
</x-layout>

