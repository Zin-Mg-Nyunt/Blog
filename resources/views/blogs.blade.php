<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/style.css">
{{-- <style>
    .bg-yellow{
        background-color: yellow;
    }
</style> --}}
<body>
    @foreach($blogs as $blog) {{-- blade directives ပုံစံ --}}
    {{-- @dd($loop) --}} {{-- laravel ရဲ့ blade က ထည့်ပေးထားတဲ့ special variable ($loop) foreach လိုမျိုး looping ပတ်တဲ့အထဲမှာသုံးလို့ရ--}}
    
    {{-- <div class="blog {{ $loop->even ?'bg-yellow' : ''}}">
        $loop က (even)စုံဖြစ်တဲ့ကောင်တွေပဲ bg-yellow ဆိုတဲ့ classဝင်မယ် ဆိုတာကို terniary operator နဲ့ရေး --}}
    <div class="blog">
        <h1><a href="/blogs/{{ $blog->slug }}"><?= $blog->title;?></a></h1>
        <div>
            <p>Published at - {{  $blog->date }}</p>
            <p>{{ $blog->intro }}</p>
        </div>
    </div>
    @endforeach
</body>
</html>