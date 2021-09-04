<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
  <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Товары</a>
      </li>
    </ul>
      <ul class="d-flex navbar-nav mr mb-2 mb-lg-0">
        <li class="nav-item dropdown left-4">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          @auth
                {{ Auth::user()->name }}
          @endauth
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @can('view-admin')
              <li><a class="dropdown-item" href="/admin">{{ __('Admin-panel') }}</a></li>
            @endcan
            <li><a class="dropdown-item disabled" href="#">{{ __('Profile') }}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </li>
          </ul>
        </li>
      </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
  </div>
</div>
</nav>
</div>
