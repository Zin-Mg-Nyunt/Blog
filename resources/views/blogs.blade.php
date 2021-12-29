<x-layout>
    <!-- hero section -->
    <x-hero />
    <!-- blogs section -->
    <x-blog-section :blogs="$blogs"/>
    {{-- : အဲ့တာကိုသုံးလိုက်ရင် တစ်ကယ် data ပါလာမယ်။ data က web.php ဘက်ကနေလာတာ။ အဲ့တာကို props လို့ခေါ်တယ်။ --}}
    {{-- props နှစ်ခုလဲပို့လို့ရတယ်။ :blogs="$blogs" data="data" အဲ့လိုရေးလို့ရတယ် --}}
    <!-- subscribe new blogs -->
    <x-subscribe />
</x-layout>

