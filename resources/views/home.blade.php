@extends('layouts.app')


@section('title', trans('product.app_name') . ' | ' . trans('product.title.header.home'))
	

@section('content')

<h1>{{ trans('product.title.page.home') }}</h1>
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
				<h6 class="card-subtitle mb-2" style="color:  rgb(241, 105, 105);">{{ trans('product.card.title.not_commanded') }}</h6>
				<p class="card-text">{{ trans('product.card.desc.not_commanded') }}</p>
				<a href="{{ route('change_step', $product->id) }}" role="button"  class="btn btn-warning">{{ trans('product.card.button.commanded') }}</a>
			  @break
		  @case(1)
			  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">{{ trans('product.card.title.not_received') }}</h6>
			  <p class="card-text">{{ trans('product.card.desc.not_received') }}</p>
			  <a href="{{ route('change_step', $product->id) }}" role="button" class="btn btn-warning">{{ trans('product.card.button.received') }}</a>
			  @break
		  @case(2)
			  <h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">{{ trans('product.card.title.not_noted') }}</h6>
			  <p class="card-text">{{ trans('product.card.desc.not_noted') }}</p>
			  <a href="{{ route('change_step', $product->id) }}" role="button" class="btn btn-danger">{{ trans('product.card.button.noted') }}</a>
			  @break
		 @case(3)
			 <h6 class="card-subtitle mb-2" style="color: rgb(137, 241, 105);">{{ trans('product.card.title.valided') }}</h6>
			 <p class="card-text">{{ trans('product.card.desc.valided') }}</p>
			 <a href="{{ route('change_step', $product->id) }}" role="button" class="btn btn-success disabled">{{ trans('product.card.button.archived') }}</a>
			  @break
		 @case(4)
			  <h6 class="card-subtitle mb-2"  style="color:rgb(241, 105, 105);">{{ trans('product.card.title.refused') }}</h6>
			  <p class="card-text">{{ trans('product.card.desc.refused') }}</p>
			   @break
		  @default
		  <h6 class="card-subtitle mb-2" style="color:rgb(241, 105, 105);">{{ trans('product.card.title.error') }}</h6>
		  <p class="card-text">{{ trans('product.card.desc.error') }}</p>
	  @endswitch
		  @else
			<h6 class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">{{ trans('product.card.title.waiting') }}</h6>
			<p class="card-text">{{ trans('product.card.desc.waiting') }}</p>
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