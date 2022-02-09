<x-layout>
    <x-single_blog_section :blog="$blog"/>
    @auth
        <section class="container">
            <div class="col-md-8 mx-auto">
                <x-card-wrapper>
                    <form
                        action="/blogs/{{ $blog->slug }}/comment"
                        method="POST"
                    >
                    @csrf
                        <div class="mb-3">
                            <textarea
                                name="comment"
                                class="form-control border border-0" 
                                cols="10" 
                                rows="5" 
                                placeholder="comment here..."
                            >
                            </textarea>
                            @error('comment')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </x-card-wrapper>
            </div>
        </section>
    @else
        <p class="text-center">
            Please <a href="/login">login</a> to comment.
        </p>
    @endauth
    <x-comments :comments="$blog->comments"/>
    <x-subscribe/>
    <x-blogs_you_may_like :randomBlog="$randomBlog"/>
</x-layout>
