<section class="container">
    <div class="col-md-8 mx-auto">
        <x-card-wrapper class="bg-secondary">
            <form>
                <div class="mb-3">
                    <textarea class="form-control" cols="10" rows="5" placeholder="comment here..."></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</section>
<section class="container">
    <div class="col-md-8  mx-auto">
        <h5 class="my-3 text-secondary">Comments {{ count($comments) }}</h5>
        @foreach ($comments as $comment)
            <x-single-comment :comment="$comment"/>
        @endforeach
    </div>
</section>