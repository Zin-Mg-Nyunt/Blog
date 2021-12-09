@extends('layout') {{-- layout file ကိုပြန်ခေါ်သုံးတဲံ့ function (laravel က support လုပ်ပေးထားတာ) --}}

@section('title') {{-- layout file ထဲကို ထည့်မယ့်နေရာတွေကို layout ထဲမှာ @yield() နဲ့ဖမ်းထားတယ်။ ပို့မဲ့ဘက်ကနေ @section() နဲ့ထည့်ပို့ပေးရတယ်။ [section() ထဲမှာထည့်မယ့် ဟာကကျတော့ layout ထဲက @yield() ထဲမှာ ထည့်ထားတဲ့ name နဲ့အတူထည့်ပေးရတယ်] --}}
    <title>All Blogs</title>
@endsection

@section('contact')
    @foreach($blogs as $blog)
    <div class="blog">
        <h1><a href="/blogs/{{ $blog->slug }}"><?= $blog->title;?></a></h1>
        <div>
            <p>Published at - {{  $blog->date }}</p>
            <p>{{ $blog->intro }}</p>
        </div>
    </div>
    @endforeach
@endsection

