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
    <h1><?= $blog->title?></h1>
    {{-- $blog object ထဲက title property ကို ခေါ်သုံးတဲ့ပုံစံ --}}
    <p><?= $blog->body?></p>
    {{-- $blog object ထဲက body property ကို ခေါ်သုံးတဲ့ပုံစံ --}}
    <a href="/">go back</a>
</body>
</html>