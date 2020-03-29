<header class="border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">

    <div class="flex items-center justify-between mb-4 md:mb-0">
        <h1 class="leading-none text-2xl text-grey-darkest">
            <a class="no-underline text-grey-darkest hover:text-black" href="/">
                CoderProphet
            </a>
        </h1>

        <a class="text-black hover:text-orange md:hidden" href="#">
            <i class="fa fa-2x fa-bars"></i>
        </a>
    </div>

    <form class="mb-4 w-full md:mb-0 md:w-1/4">
        <label class="hidden" for="search-form">Search</label>
        <input class="bg-grey-lightest border-2 focus:border-orange p-2 rounded-lg shadow-inner w-full" placeholder="Search" type="text">
        <button class="hidden">Submit</button>
    </form>

    <nav>
        <ul class="list-reset md:flex md:items-center">
            <li class="md:ml-4">
                <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0"
                    href="{{route('posts.index')}}"
                >
                    Posts
                </a>
            </li>
            @can('manage-posts')
            <li class="md:ml-4">
                <a class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0"
                    href="{{route('posts.create')}}"
                >
                    Create
                </a>
            </li>
            @endcan
            <li class="md:ml-4">
                <a class="border-t block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0"
                   href="#"
                >
                    Contact
                </a>
            </li>
        </ul>
    </nav>

</header>
