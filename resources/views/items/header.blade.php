<header class="card-header">
    <div class="dropdown is-hoverable">
        <div class="dropdown-trigger">
            <p class="card-header-title has-cursor-pointer">
                Select
                <span class="icon is-small">
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
            </p>
        </div>
        <div class="dropdown-menu" id="dropdown-menu" role="menu">
            <div class="dropdown-content">
                <a href="{{ url('/items') }}" class="dropdown-item">
                    All Items
                </a>
                <hr class="dropdown-divider">
                @foreach ($places as $place)
                    <a href="/items/{{$place->slug}}" class="dropdown-item">
                        {{$place->name}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</header>
