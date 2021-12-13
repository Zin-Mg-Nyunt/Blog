<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ $title }}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-navbar /> {{-- navbar file ကိုလှမ်းချိတ်တာ --}}
    {{ $slot }} {{-- default slot ကိုသုံးလိုက်တဲ့အခါ laravel ရဲ့ blade က support ပေးထားတဲ့ $slot ဆိုတဲ့(super variable) နဲ့ပြန်ဖမ်းလိုက်ရုံပဲ --}}

    {{-- {{ $contact }} $contact ဆိုတာက တစ်ဘက်ကပြန်ပို့တဲ့ data ကိုလက်ခံပြီး variable တစ်ခုအနေနဲ့ပြန်ပြဖို့သုံးတာ(slot layout ပုံစံနဲ့ရေးရင် ဒီလိုရေးရ) --}}
</body>
</html>