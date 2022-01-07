<div class="dropdown">
    <button 
      class="btn btn-outline-primary dropdown-toggle" 
      type="button" 
      id="dropdownMenuButton1" 
      data-bs-toggle="dropdown" 
      aria-expanded="false"
    >
      {{ isset($currentCategory) ? $currentCategory->name : "Filter By Category" }}
    </button>
    <ul 
      class="dropdown-menu" 
      aria-labelledby="dropdownMenuButton1"
    >
      @foreach ($categories as $category)
      <li>
        <a 
          class="dropdown-item" 
          href="/?category={{ $category->slug }}"
        >
        {{-- category routes နဲ့သွားစရာမလိုတော့ဘူး။ request data နဲ့ပဲသွားလို့ရပြီဆိုတော့ link ချိတ်တာကိုလာပြောင်း --}}
          {{ $category->name }}
        </a>
      </li>
      @endforeach
    </ul>
  </div>