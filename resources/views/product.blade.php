@extends('layouts.app')


@section('title', trans('product.app_name') . ' | ' . trans('product.title.header.product'))
    

@push('head')
    <style>
      .card-text 
      {
        display: block;
      }
    </style>
@endpush

@section('content')


@if (!empty($product))



<div style="text-align: center;">
  <h1 style="border-bottom: 1px solid black;">{{ trans('product.title.page.product', ['name' => $product->name]) }}</h1>
  <div style="display: block">
    <img style="width: 500px; height: auto; border-bottom: 2px solid black; padding-bottom: 10px;" src="{{ asset('storage/' . $product->img) }}" alt="Image du produit">
  
    <p class="card-text"><strong> Prix : </strong><small>{{ $product->price }} €</small></p>
    <p class="card-text"><strong>Description du produit : </strong>{{ $product->desc_product }}</p>
    <p class="card-text"><strong><small>Mot clé : </strong>{{ $product->keywords }}</small></p>
    <p class="card-text"><strong><small>Référence : </strong>{{ $product->reference }}</small></p>
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