    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($category as $item)
                <li><a class="dropdown-item" href="{{ route('categories.category', $item->id) }}">{{ $item->    name }}</a>
                </li>
            @endforeach
        </ul>
    </li>
