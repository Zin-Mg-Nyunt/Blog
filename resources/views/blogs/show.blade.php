<x-layout>
    <x-single_blog_section :blog="$blog"/>
        <section class="container">
            <div class="col-md-8 mx-auto">
                @auth
                <x-card-wrapper>
                    <form
                        action="/blogs/{{ $blog->slug }}/comment"
                        method="POST"
                    >
                    @csrf
                        <div class="mb-3">
                            <textarea
                                required
                                name="comment"
                                class="form-control border border-0" 
                                cols="10" 
                                rows="5" 
                                placeholder="say something..."
                            ></textarea>
                            <x-error name="comment" />
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </x-card-wrapper>
                @else
                    <p class="text-center">
                        Please <a href="/login">login</a> to comment.
                    </p>
                @endauth
            </div>
        </section>
        @if ($blog->comments->count())
        {{-- latest() ဆိုတာက နောက်ဆုံးရေးတဲ့ဟာက အပေါ်ဆုံးကပြအောင်လုပ်တာ --}}
        <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
        @endif
    <x-blogs_you_may_like :randomBlog="$randomBlog"/>
</x-layout>
