<x-layout> 
    <x-slot name='title'> 
        <title>All Blogs</title>
    </x-slot>

    @foreach($blogs as $blog)
    {{-- loop ပတ်တဲ့အချိန်မှာ query တစ်ခါrun --}}
        <div class="blog">
            <h1><a href="/blogs/{{ $blog->slug }}"> {{  $blog->title }} </a></h1>
            <a href="/categories/{{ $blog->category->slug }}">
                {{ $blog->category->name }}
    {{-- Eloquent Relationship သုံးတဲ့အခါမှာ loop ပတ်လို့ရတဲ့ data ရှိသလောက် queryက ထပ်run။ အဲ့တော့ preform လျော့စေတယ်။အဲ့လိုမဖြစ်အောင် loop ရဲ့အပြင်မှာ Eloquent Relationship ကိုသုံးထားလိုက်မယ်ဆိုရင် query စုစုပေါင်းမှ နှစ်ခါပဲ run စရာလိုတော့မယ် --}}
            </a>
            <div>
                <p>Published at - {{  $blog->created_at->diffForHumans() }}</p>
                <p>{{ $blog->intro }}</p>
                <p>Updated at - {{ $blog->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</x-layout>

