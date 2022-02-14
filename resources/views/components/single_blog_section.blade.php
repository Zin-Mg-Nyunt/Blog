@props(['blog'])
<div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img
          src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
          class="card-img-top"
          alt="..."
        />
        <h3 class="my-3">
          {{ $blog->title }}
        </h3>
        <div>Author - 
          <a href="/?username={{ $blog->author->username }}">
            {{ $blog->author->name }}
          </a>
        </div>
        <div>
          <a href="/?category={{ $blog->category->slug }}">
            <span class="badge bg-primary">
              {{ $blog->category->name }}
            </span>
          </a>
        </div>
        <div>
          {{ $blog->created_at->diffForHumans() }}
        </div>
        <div>
          <form action="" method="POST">
            {{-- condition စစ်ပြီး subscribe button ပြမလား၊ unsubscribe button ပြမလား လုပ်တာ --}}
            @if (auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger">Unsubscribe</button>
            @else
              <button class="btn btn-warning">Subscribe</button>
            @endif
          </form>
        </div>
        <p class="lh-md mt-3">
          {{ $blog->body }}
        </p>
      </div>
    </div>
  </div>