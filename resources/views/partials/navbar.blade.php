<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
      </a>
  
      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item {{ Request::is('posts') ? 'is-active' : '' }}" href="{{ route('posts.index') }}">
          Posts
        </a>
        @can('manage-posts')
        <a class="navbar-item {{ Request::is('posts/create') ? 'is-active' : '' }}" href="{{ route('posts.create') }}">
          Create
        </a>
        @endcan
      </div>
  
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            @guest
            <a class="button is-primary" href="/register">
              <strong>Sign up</strong>
            </a>
            <a class="button is-light" href="/login">
              Log in
            </a>
            @endguest
            @auth
            <form action="logout" method="POST">
              @csrf
              <button class="button is-light">Log out</button>
            </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </nav>