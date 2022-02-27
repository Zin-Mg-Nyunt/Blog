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
        {{-- ternary operator နည်းလမ်းနဲ့ condition စစ်ပြီး mutiple query ကို ui ပိုင်းကနေလုပ်သွားတာ --}}
        {{-- author name ကိုနှိပ်ပြီး author username နဲ့ data ရှာလိုက်တဲ့ချိန်မှာ category key နဲ့ data ရှာထားတာရှိလား ရှိရင် ပေါင်းထည့်ပေးပါ/ မရှိရင် မထည့်ပါနဲ့။ အဲ့လိုပဲ search key နဲ့ data ရှာထားတာရှိလား ရှိရင်ပေါင်းထည့်ပေးပါ/ မရှိရင် မထည့်ပါနဲ့ --}}
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