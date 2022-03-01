@props(['blog'])
<div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img
          src="{{ $blog->thumbnail!==null ? asset('/storage/'.$blog->thumbnail) : 'https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg' }}"
          alt="..."
          class="card-img-top"
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
          <form 
            action="/blogs/{{ $blog->slug }}/subscription" 
            method="POST"
            >
            @csrf
            {{-- ဒီလိုမှမစစ်ထားရင် login မဝင်ထားတဲ့ user တစ်ယောက်ကဝင်လာခဲ့ရင်  isSubscribed()  method ကို auth()->user() ထဲကစစ်တာဖြစ်တဲ့အတွက် login မဝင်ထားရင် auth()->user() က null ဖြစ်နေတဲ့အတွက် error ပြတယ် --}}
            @auth
              @if (auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger">Unsubscribe</button>
              @else
              <button class="btn btn-warning">Subscribe</button>
              @endif
            @endauth
          </form>
        </div>
        <p class="lh-md mt-3">
          {{ $blog->body }}
        </p>
      </div>
    </div>
  </div>