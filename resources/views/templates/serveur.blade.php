<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
  .small-img{
    width: 60px;
    height: 60px;
    object-fit: cover;
    display: block;
  }
   .medium-img{
    width: 150px;
    height: 150px;
    object-fit: cover;
    display: block;
  }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('menu')}}">Mon Resto
        <br>
       Serveur: {{ Auth::user()->name}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link  {{ Route::is('dashboard')? 'active':''}}" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Commandes</a>
        </li>
      </ul>
    </div>
    <div>
      @if(session()->has("commande"))
        @php
          $commande=session()->get("commande");
          $nombrePlats= $commande->plats()->count();
        @endphp
        Commande créée :
         <a href=""  class="btn btn-success">Editer</a>
          <a href=""  class="btn btn-primary">Terminer ({{$nombrePlats}})</a>
      @else
         <a href=""  class="btn btn-primary">Nouvelle commande</a>
      @endif

    </div>
  </div>
</nav>

<div class="container">
    @yield("contenu")
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
