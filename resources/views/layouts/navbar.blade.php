<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">AmazonTesting</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @guest
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('login') }}">{{ trans('product.navbar.login') }}</a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ trans('product.navbar.product') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">{{ trans('product.navbar.logout') }}</a>
            </li>
            @if (Auth::user()->isAdmin())
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin') }}">Administration</a>
            </li>        
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Inscription</a>
            </li>            
            @endif
            @endauth
        </ul>
      </div>
    </div>
  </nav>