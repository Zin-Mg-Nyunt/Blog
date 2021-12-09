<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>{{ $blog->title }}</h1>
    <div>
        <p>Published at -{{ $blog->date }}</p>
        <p>{!! $blog->body !!}</p>
        {{-- laravel blade မှာ {{  }} အတွန့်ကွင်းနှစ်ထပ်က html code တွေကို escape လုပ်ပေးထားတယ်။ အဲ့တော့ html code တွေကို အလုပ်လုပ်စေချင်ရင် {!!  !!} အဲ့တာလေးနဲ့ရေးပေးရတယ် --}}
    </div>
    <a href="/">go back</a>
</body>
</html>