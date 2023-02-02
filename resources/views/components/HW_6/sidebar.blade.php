<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('hw_6.preset_all_news')) active @endif"
                    href="{{ route('hw_6.preset_all_news') }}">
                    <span data-feather="home"></span>
                    Главная страница <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('hw_6.news.index')) active @endif"
                    href="{{ route('hw_6.news.index') }}">
                    <span data-feather="file"></span>
                    Редактировать новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('hw_6.categories.index')) active @endif"
                    href="{{ route('hw_6.categories.index') }}">
                    <span data-feather="file"></span>
                    Редактировать категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('hw_6.sources.index')) active @endif"
                    href="{{ route('hw_6.sources.index') }}">
                    <span data-feather="file"></span>
                    Редактировать источники новостей
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link @if (request()->routeIs('hw_6.orderForm.index')) active @endif"
                  href="{{ route('hw_6.orderForm.index') }}">
                  <span data-feather="file"></span>
                  Редактировать форму заказов
              </a>
            </li>
        </ul>
    </div>
</nav>
