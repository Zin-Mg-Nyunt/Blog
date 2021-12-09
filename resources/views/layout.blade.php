<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('title') {{-- title နေရာကို အသေမရိုက်ထားပဲ ဟိုဘက်ကပြန်ပို့မယ့်ကောင်ကို လက်ခံဖို့ @yield() နဲ့ဖမ်းထား။ ဟိုဘက်က ပြန်ပို့ရင် @section() နဲ့ပြန်ပို့ရ။ --}}

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <li>Main</li>
        <li>About</li>
        <li>Contact</li>
    </nav>

@yield('contact') {{-- contact(ကြားထဲမှာထည့်မယ့် data) နေရာကို အသေမရိုက်ထားပဲ ဟိုဘက်ကပြန်ပို့မယ့်ကောင်ကို လက်ခံဖို့ @yield() နဲ့ဖမ်းထား။ ဟိုဘက်က ပြန်ပို့ရင် @section() နဲ့ပြန်ပို့ရ။ --}}

</body>
</html>