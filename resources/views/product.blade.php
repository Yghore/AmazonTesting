@extends('layouts.app')


@section('title', 'Amazon Testing | Login')
    

@section('content')


@if (!empty($product))
<h1>Produits - {{ $product->name }}</h1>

<div class="row">
    <p><strong>Description : </strong>{{ $product->desc_product }}</p>
    <h3><strong>Prix : </strong>{{ $product->price }}</h3>
    <h3><strong>Mots clé : </strong>{{ $product->keywords }}</h3>
    <h3><strong>Référence : </strong>{{ $product->reference }}</h3>
    <h3><strong>Image : </strong></h3>
    <div class="col"><img src="{{ $product->img }}" alt="Image du produit"></div>
</div>


@else

<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Une erreur est survenue</h4>
    <p>Ce produit n'existe pas, si le problème persiste. Merci de contacter un Administrateur.</p>
    <hr>
    <p class="mb-0">Revenir en <a href="{{ route('home') }}">l'accueil</a></p>
  </div>

@endif




@endsection