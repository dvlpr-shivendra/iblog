<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="/logo.svg" width="auto" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasicExample">
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
                <a class="navbar-item {{ Request::is('posts/create') ? 'is-active' : '' }}"
                   href="{{ route('posts.create') }}">
                    Create
                </a>
            @endcan
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" placeholder="Find a post">
                    </div>
                    <div class="control">
                        <a class="button is-info">
                            <span class="material-icons">
                                search
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
