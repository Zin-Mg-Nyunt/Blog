<x-layout> {{-- layout file ကိုလှမ်းချိတ်တာ (blade components layout ပုံစံ) --}}
    {{-- slot ကိုသုံးပြီးတော့ variable နဲ့ပြန်ဖမ်းတယ့်ပုံစံ --}}
    {{-- <x-slot name='contact'> 
        @foreach($blogs as $blog)
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->slug }}">{{  $blog->title }} </a></h1>
            <div>
                <p>Published at - {{  $blog->date }}</p>
                <p>{{ $blog->intro }}</p>
            </div>
        </div>
        @endforeach --}}

    <x-slot name='title'> {{-- name='title' ဆိုတာက ဟိုဘက်(layout file)မှာ ပြန်ဖမ်းထားတဲ့ variable name --}}
        <title>All Blogs</title>
    </x-slot>

    {{-- default slot ကိုသုံးပြီးရေးတဲ့ပုံစံ --}}
    @foreach($blogs as $blog)
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->slug }}"> {{  $blog->title }} </a></h1>
            <div>
                <p>Published at - {{  $blog->date }}</p>
                <p>{{ $blog->intro }}</p>
            </div>
        </div>
    @endforeach
</x-layout>

