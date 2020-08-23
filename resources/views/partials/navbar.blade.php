<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item has-text-weight-bold" href="/">
            ModestDev
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
           data-target="navbarBasic">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>

        <div class="navbar-item is-hidden-desktop">
            <a class="button is-info search-button"
                onclick="document.querySelector('#search-modal').classList.add('is-active')">
                <span class="material-icons">
                    search
                </span>
            </a>
        </div>
        
    </div>

    <div id="navbarBasic" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item {{ Request::is('posts') ? 'active-link' : '' }}" href="{{ route('posts.index') }}">
                Posts
            </a>
            <a class="navbar-item {{ Request::is('pages/contact') ? 'active-link' : '' }}" href="/pages/contact">
                Contact
            </a>
            @can('manage-posts')
                <a class="navbar-item {{ Request::is('posts/create') ? 'active-link' : '' }}"
                   href="{{ route('posts.create') }}">
                    Create
                </a>
            @endcan
        </div>

        <div class="navbar-end">
            <div class="navbar-item is-hidden-touch">
                <div class="control">
                    <a class="button is-primary search-button"
                        onclick="document.querySelector('#search-modal').classList.add('is-active', 'fadeIn')">
                        <span class="material-icons">
                            search
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
