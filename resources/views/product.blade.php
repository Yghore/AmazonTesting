@extends('layouts.app')


@section('title', trans('product.app_name') . ' | ' . trans('product.title.header.product'))
    

@section('content')


@if (!empty($product))
<h1>{{ trans('product.title.page.product', ['name' => $product->name]) }}</h1>


<div class="container-fluid">
  <div class="row my-3">
     <div class="col-12 col-sm-6 my-3">
       <div class="card">
         <div class="position-relative">
          <img class="card-img-top" src="{{ asset('storage/' . $product->img) }}" alt="Image du produit">
         </div>
         <div class="card-body">
           <h5 class="card-title"><small>{{ $product->name }}</small></h5>
           <p class="card-text"><small>{{ $product->price }} €</small></p>
           <p class="card-text">Description du produit : {{ $product->desc_product }}</p>
           <p class="card-text"><small>Mot clé : {{ $product->keywords }}</small></p>
           <p class="card-text"><small>Référence : {{ $product->reference }}</small></p>
         </div>
       </div>
    </div>
  </div>
 </div>


@else

<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Une erreur est survenue</h4>
    <p>Ce produit n'existe pas, si le problème persiste. Merci de contacter un Administrateur.</p>
    <hr>
    <p class="mb-0">Revenir à <a href="{{ route('home') }}">l'accueil</a></p>
  </div>

@endif




@endsection