<x-layout> 
    <x-slot name='title'> 
        <title>All Blogs</title>
    </x-slot>

    @foreach($blogs as $blog)
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->slug }}"> {{  $blog->title }} </a></h1>
            <a href="">{{ $blog->category->name }}</a>
            {{-- loop ပတ်ထားတာမို့လို့ blog တွေက တစ်ခုချင်းစီ loop ပတ်ပြီး ဝင်လာနေတာမို့လို့ သက်ဆိုင်ရာ blog ရဲ့ category တွေကလဲ တစ်လှည့်စီဝင်လာမယ် --}}
            <div>
                <p>Published at - {{  $blog->created_at->diffForHumans() }}</p>
                <p>{{ $blog->intro }}</p>
                <p>Updated at - {{ $blog->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</x-layout>

