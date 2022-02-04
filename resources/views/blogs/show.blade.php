<x-layout>
    <x-single_blog_section :blog="$blog"/>
    <x-comments :comments="$blog->comments"/>
    <x-subscribe/>
    <x-blogs_you_may_like :randomBlog="$randomBlog"/>
</x-layout>
