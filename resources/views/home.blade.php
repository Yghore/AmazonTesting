@extends('layouts.app')


@section('title', 'Amazon Testing | Login')
	

@section('content')

<h1>Acceuil - Vos produits</h1>

<div class="row">
	@forelse ($products_user as $product)
	  <div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">{{ $product->name }}</h5>
		  @switch($product->step)
			  @case(0)
					<h6 class="card-subtitle mb-2" style="color:  rgb(241, 105, 105);">Non commandé</h6>
				  @break
			  @case(1)
				  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non reçu</h6>
				  @break
			  @case(2)
				  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non noté</h6>
				  @break
			 @case(3)
				  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">En cours de validation</h6>
				  @break
			 @case(4)
				 <h6 class="card-subtitle mb-2" style="color: rgb(137, 241, 105);">Validé</h6>
				  @break
			 @case(5)
				  <h6 class="card-subtitle mb-2"  style="color:rgb(241, 105, 105);">Refusé</h6>
				   @break
			  @default
			  <h6 class="card-subtitle mb-2" style="color:rgb(241, 105, 105);">Erreur</h6>
		  @endswitch
		  <p class="card-text">Merci d'acheter le produit</p>
		  <button type="button" class="btn btn-primary" style="margin-bottom: 3px;">Voir la fiche</button>
		  <button type="button" class="btn btn-danger">Confirmé l'achat</button>
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

	{{-- <div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">Aukey ET549</h5>
		  <h6 class="card-subtitle mb-2" style="color: rgb(241, 105, 105);">Non noté</h6>
		  <p class="card-text">Merci de donner votre avis sur le produit (5 étoiles ...) !</p>
		   <button type="button" class="btn btn-primary" style="margin-bottom: 3px;">Voir la fiche</button>
		   <button type="button" class="btn btn-warning">Confirmé la note</button>
		</div>
	</div>
	<div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">Aukey ET549</h5>
		  <h6 class="card-subtitle mb-2" style="color: rgb(241, 105, 105);">Non noté</h6>
		  <p class="card-text">Merci de donner votre avis sur le produit (5 étoiles ...) !</p>
		   <button type="button" class="btn btn-primary" style="margin-bottom: 3px;">Voir la fiche</button>
		   <button type="button" class="btn btn-warning">Confirmé la note</button>
		</div>
	</div>
	<div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">Aukey ET549</h5>
		  <h6 class="card-subtitle mb-2" style="color: rgb(255, 169, 31);">En cours</h6>
		  <p class="card-text">Votre produit est en cours de validation ...</p>
		   <button type="button" class="btn btn-primary">Voir la fiche</button>        </div>
	</div>
	<div class="card" style="width: 18rem; margin: 10px;">
		<div class="card-body">
		  <h5 class="card-title">Aukey ET549</h5>
		  <h6 class="card-subtitle mb-2" style="color: rgb(137, 241, 105);">Validé</h6>
		  <p class="card-text">Votre produit à été validé !</p>
		   <button type="button" class="btn btn-primary">Voir la fiche</button>
		</div>
	</div> --}}
</div>



@endsection