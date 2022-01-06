@props(['blog'])
{{-- @props() ဆိုတာက component တစ်ခုက ပေးလိုက်တဲ့ data တွေဝင်လာတာပါဆိုတာသိစေဖို့သုံးတာ။ default data တွေလဲသတ်မှတ်လို့ရတယ် --}}
<div class="card">
    <img
      src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{ $blog->title }}</h3>
      <p class="fs-6 text-secondary">
        <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a>
        <span> - {{ $blog->created_at->diffForHumans() }}</span>
      </p>
      <div class="tags my-3">
        <a href="/?category={{ $blog->category->slug }}"><span class="badge bg-primary">{{ $blog->category->name }}</span></a>
        {{-- category routes နဲ့သွားစရာမလိုတော့ဘူး။ request data နဲ့ပဲသွားလို့ရပြီဆိုတော့ link ချိတ်တာကိုလာပြောင်း --}}
      </div>
      <p class="card-text">
        Some quick example text to build on the Blog title and make up
        the bulk of the card's content.
      </p>
      <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
    </div>
  </div>