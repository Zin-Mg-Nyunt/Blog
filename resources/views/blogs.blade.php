<x-layout>
    <!-- hero section -->
    <x-hero />
    <!-- blogs section -->
    <x-blog-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory??null"/>
    {{-- $curretnCategory??null ဆိုတာက ternial operator ကိုအတိုကောက်ရေးထားတာ။ $currentCategory ? $currentCategory : null အဲ့လိုရေးတာနဲ့တူတူပဲ --}}
    <!-- subscribe new blogs -->
    <x-subscribe />
</x-layout>

