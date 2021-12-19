<x-layout> 
    <x-slot name='title'> 
        <title>All Blogs</title>
    </x-slot>

    @foreach($blogs as $blog)
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->slug }}"> {{  $blog->title }} </a></h1>
            <div>
                <p>Published at - {{  $blog->created_at->diffForHumans() }}</p>
                {{-- diffForHumans() က အချိန်ကို လူတွေဖတ်လို့လွယ်အောင် laravel က လုပ်ပေးတဲ့ method --}}
                <p>{{ $blog->intro }}</p>
                <p>Updated at - {{ $blog->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</x-layout>

