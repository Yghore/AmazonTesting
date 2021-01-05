@extends('layouts.app')


@section('title', 'Amazon Testing | Login')
	

@section('content')

<h1>Acceuil - Vos produits</h1>
@if($errors->any())
<div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
@endif
<div class="row">
	@forelse ($products_user as $product)
	  <div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">{{ $product->name }}</h5>
		  @if ($product->isValidate)
		  @switch($product->step)
		  @case(0)
				<h6 class="card-subtitle mb-2" style="color:  rgb(241, 105, 105);">Non commandé</h6>
				<p class="card-text">Merci d'acheter le produit</p>
				<a href="{{ route('change_step', $product->id) }}" role="button"  class="btn btn-warning">Confirmé l'achat</a>
			  @break
		  @case(1)
			  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non reçu</h6>
			  <p class="card-text">Avez vous reçu votre commande ?</p>
			  <a href="{{ route('change_step', $product->id) }}" role="button" class="btn btn-warning">J'ai bien reçu la commande</a>
			  @break
		  @case(2)
			  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non noté</h6>
			  <p class="card-text">Merci de noter le produit en suivant les conditions</p>
			  <a href="{{ route('change_step', $product->id) }}" role="button" class="btn btn-danger">J'ai bien noté</a>
			  @break
		 @case(3)
			 <h6 class="card-subtitle mb-2" style="color: rgb(137, 241, 105);">Validé</h6>
			 <p class="card-text">Vous avez bien effectué toutes les étapes !</p>
			 <a href="{{ route('change_step', $product->id) }}" role="button" class="btn btn-success">Archiver le produit</a>
			  @break
		 @case(4)
			  <h6 class="card-subtitle mb-2"  style="color:rgb(241, 105, 105);">Refusé</h6>
			  <p class="card-text">Vous n'avez pas bien suivi la procédures ! vous allez être contacté d'ici peu</p>
			   @break
		  @default
		  <h6 class="card-subtitle mb-2" style="color:rgb(241, 105, 105);">Erreur</h6>
		  <p class="card-text">Une erreur est survenue, merci de contacter un Administrateur</p>
	  @endswitch
		  @else
			<h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">En cours de validation</h6>
			<p class="card-text">Vérification de l'étape...</p>
			@endif
		  
		  <a href="{{ route('product', $product->id) }}" role="button" class="btn btn-primary" style="margin-top: 3px;">Voir la fiche produit</a>
		  <p class="card-text"><small class="text-muted">Dernière modification : {{ $product->updated_at }}</small></p>
		</div>
	</div>       
	@empty
	<div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">Aucun produit</h5>
		  <h6 class="card-subtitle mb-2" style="color:rgb(241, 105, 105);">??</h6>
		  <p class="card-text">Tu ne semble pas avoir de produit</p>
		  <button type="button" class="btn btn-primary disabled" style="margin-bottom: 3px;">Voir la fiche</button>
		</div>
	</div>		
	@endforelse

</div>



@endsection