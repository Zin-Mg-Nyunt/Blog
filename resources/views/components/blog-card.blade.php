@props(['blog'])
{{-- @props() ဆိုတာက component တစ်ခုက ပေးလိုက်တဲ့ data တွေဝင်လာတာပါဆိုတာသိစေဖို့သုံးတာ။ default data တွေလဲသတ်မှတ်လို့ရတယ် --}}
<div class="card">
    <img
      src="{{ $blog->thumbnail!==null ? asset('/storage/'.$blog->thumbnail) : 'https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg' }}"
      alt="..."
      class="card-img-top"
    />
    <div class="card-body">
      <h3 class="card-title">{{ $blog->title }}</h3>
      <p class="fs-6 text-secondary">
        <a 
          href="/?username={{ $blog->author->username }}
          {{ request('category')?'&category='.request('category'):"" }}
          {{ request('search')?'&search='.request('search'):"" }}"
        >
          {{ $blog->author->name }}
        </a>
        <span> - {{ $blog->created_at->diffForHumans() }}</span>
      </p>
      <div class="tags my-3">
        <a href="/?category={{ $blog->category->slug }}"><span class="badge bg-primary">{{ $blog->category->name }}</span></a>
      </div>
      <p class="card-text">
        {{ $blog->intro }}
      </p>
      <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
    </div>
  </div>