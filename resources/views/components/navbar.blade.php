<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
        @auth
          <a href="/" class="nav-link">
            {{ 'Welcom '.auth()->user()->name }}
          </a>
          <img 
            src="{{ auth()->user()->avatar }}" 
            width="30"
            height="30"
            class="rounded-circle my-1"
          >
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
          <a href="/login" class="nav-link">
            Login
          </a>
        @endauth
      </div>
    </div>
  </nav>