<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('preset_all_news')) active @endif" href="{{route('preset_all_news', ['counter' => 2])}}">
            <span data-feather="home"></span>
            Главная страница <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('category_news')) active @endif" href="{{route('category_news')}}">
            <span data-feather="file"></span>
            Категории
          </a>
        </li>
          </a>
        </li>
      </ul>
    </div>
  </nav>