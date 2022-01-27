<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
        {{-- @if (!auth()->check()) --}}
        {{-- auth()->check() ဆိုတာက login ဝင်ထားလားစစ်တာ၊ ဝင်ထားရင် true / မဝင်ထားရင် false --}}
          {{-- <a href="/register" class="nav-link">Register</a> --}}
        {{-- @else --}}
          {{-- <a href="/" class="nav-link">
            {{ 'Welcome '.auth()->user()->name }}
          </a> --}}
        {{-- @endif --}}
        {{-- @if (auth()->check())
          <form action="/logout" method="POST">
            @csrf
            <button 
            type="submit"
            class="nav-link btn btn-link"
            >
              Logout
            </button>
          </form>
        @endif --}}

        {{-- auth နဲ့ရေးနည်း --}}
        {{-- @auth
          <a href="/" class="nav-link">
            {{ 'Welcom '.auth()->user()->name }}
          </a>
          <form action="/logout" method="POST">
            @csrf
            <button
            type="submit"
            class="nav-link btn btn-link"
            >
              Logout
            </button>
          </form>
        @else
          <a href="/register" class="nav-link">
            Register
          </a>
        @endauth --}}

        {{-- guest နဲ့ရေးနည်း --}}
        @guest 
        {{-- guest ဧည့်သည်ဆိုရင် register လုပ် ပြီး login ဝင် --}}
          <a href="/register" class="nav-link">
            Register
          </a>
          <a href="/login" class="nav-link">
            Login
          </a>
        @else
        {{-- ဧည့်သည်မဟုတ်ရင် welcom ပြပြီး logout လုပ်နိုင် --}}
          <a href="/" class="nav-link">
            {{ 'Welcom '.auth()->user()->name }}
          </a>
          <form action="/logout" method="POST">
          @csrf
            <button
            type="submit"
            class="nav-link btn btn-link"
            >
              Logout
            </button>
          </form>
        @endguest
      </div>
    </div>
  </nav>