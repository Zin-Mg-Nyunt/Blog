@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">
      Blogs
    </h1>
    <div class="">
      <x-category-dropdown />
      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}
    </div>
    <form action="" class="my-3">
      {{-- ဘာ method မှမပါရင် default အနေနဲ့ GET method ကိုသတ်မှတ်ပေးထား --}}
      <div class="input-group mb-3">
        <input
          name="search"
          type="text"
          value="{{ request('search') }}"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
      {{-- @if ($blogs->count())
      @foreach ($blogs as $blog)
      <div class="col-md-4 mb-4">
        <x-blog-card :blog="$blog"/>
      </div>
      @endforeach
      @else
      <p>No Blogs Found</p>
      @endif --}}
      {{-- if else ကိုပဲ တိုပြီးရိုးရှင်းပြီးလွယ်ကူတဲ့ပုံစံနဲ့ဖြစ်အောင် laravel မှာရေးနည်း --}}

      @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
          <x-blog-card :blog="$blog" />
        </div>
      @empty
        <p>No Blogs Found</p>
      @endforelse
    </div>
  </section>