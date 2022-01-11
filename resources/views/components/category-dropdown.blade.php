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
    {{-- ဒါက category အားလုံးကိုပြတဲ့ နေရာကိုပြန်သွားချင်ရင် သွားလို့ရအောင် ထည့်ထားပေးတာ --}}
      <li>
        <a 
          class="dropdown-item" 
          href="/"
        >
          all
        </a>
      </li>
      @foreach ($categories as $category)
      <li>
        <a 
          class="dropdown-item" 
          {{-- ternary operator နည်းလမ်းနဲ့ condition စစ်ပြီး mutiple query ကို ui ပိုင်းကနေလုပ်သွားတာ --}}
          {{-- category name ကိုနှိပ်ပြီး category slug နဲ့ data ရှာလိုက်တဲ့ချိန်မှာ search key နဲ့ data ရှာထားတာရှိလား ရှိရင် ပေါင်းထည့်ပေးပါ/ မရှိရင် မထည့်ပါနဲ့။ အဲ့လိုပဲ username key နဲ့ data ရှာထားတာရှိလား ရှိရင်ပေါင်းထည့်ပေးပါ/ မရှိရင် မထည့်ပါနဲ့ --}}
          href="/?category={{ $category->slug }}{{ request('search') ? '&search='.request('search') : "" }}{{ request('username') ? '&username='.request('username') : "" }}"
        >
          {{ $category->name }}
        </a>
      </li>
      @endforeach
    </ul>
  </div>