<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>
    

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c6e988ae8a.js" crossorigin="anonymous"></script>
    <!-- Favicons -->
        


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{ trans('product.app_name') }}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
              <i class="fas fa-home"></i>
              Home
            </a>
          </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Utilisateur</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <i class="fas fa-user"></i>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users_list') }}">
                <i class="fas fa-users"></i>
              Liste des utilisateurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_add') }}">
              <i class="fas fa-user-plus"></i>
              Ajouter un utilisateur
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_add_product') }}">
              <i class="fas fa-comments-dollar"></i>
              Ajouter un produit à un utilisateur
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Produits</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products_list') }}">
                <i class="fas fa-gifts"></i>
                Liste des produits
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('product_add') }}">
                <i class="fas fa-cart-arrow-down"></i>
                Ajouter un produit
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Images</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <i class="fas fa-images"></i>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('images_list') }}">
                <i class="fas fa-sd-card"></i>
                Liste des images
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('image_add') }}">
                <i class="fas fa-file-image"></i>
                Ajouter une image
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Gestion des produits</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <i class="fas fa-tasks"></i>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('waiting_list') }}">
                <i class="fas fa-sync"></i>
                Liste en attente
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('manager_product') }}">
                <i class="fas fa-sync-alt"></i>
                Produit en cours
              </a>
            </li>
          </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('dashboard_title')</h1>
      </div>
      @if (session('success'))
      <div class="alert alert-success" role="alert">{{session('success')}}</div>
      @endif
      @if($errors->any())
      <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
      @endif
      @yield('content')
      

    </main>
  </div>
</div>

  </body>