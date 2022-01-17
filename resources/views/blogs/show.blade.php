<x-layout>
    <x-single_blog_section :blog="$blog"/>
{{-- ဒီက $blog က web.php ရဲ့ get('/blogs/{ blog:slug }') ကပို့လိုက်တဲ့ကောင် --}}
   <x-subscribe/>
   <x-blogs_you_may_like :randomBlog="$randomBlog"/>
{{-- ဒီက $randomBlog က web.php ရဲ့ get('/blogs/{ blog:slug }') ကပို့လိုက်တဲ့ကောင် --}}
</x-layout>



