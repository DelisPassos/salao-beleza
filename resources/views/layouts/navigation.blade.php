<nav class="navbar navbar-expand-lg bg-black border-bottom border-warning">
  <div class="container">
    <x-application-logo private/>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-warning {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            La Belle
          </a>
        </li>
      </ul>

      <!-- Dropdown do usuário -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-warning" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end bg-black border-warning" aria-labelledby="userDropdown">
            <li>
              <a class="dropdown-item text-warning" href="{{ route('profile.edit') }}">Profile</a>
            </li>
            <li>
              <hr class="dropdown-divider border-warning">
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-warning">Log Out</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
