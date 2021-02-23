@extends('admin.dashboard')


@section('title', 'Amazon Testing | Produits')
@section('dashboard_title', 'Dashboard - Editer un produit')


@section('content')


@if($errors->any())
<div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
@endif
<form method="POST" action="{{ route('admin.product.edit', $product->id) }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label"><strong>Nom :</strong></label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="name" value="{{ $product->name }}" placeholder="Aukey EP-T31">
    </div>
    <label for="price" class="form-label"><strong>Prix :</strong></label>
    <div class="mb-3 input-group">
        <input type="number" step="0.01" min="0.01" max="800" class="form-control" name="price" id="price" aria-describedby="price" value="{{ $product->price }}" placeholder="19,99">
        <span class="input-group-text"><strong>€</strong></span>
    </div>
    <div class="mb-3">
        <label for="keywords" class="form-label"><strong>Mots clé :</strong></label>
        <input type="text" class="form-control" name="keywords" id="keywords" aria-describedby="keywords" value="{{ $product->keywords }}" placeholder="Ecouteur, audio, bluetooth">
    </div>
    <div class="mb-3">
        <label for="reference" class="form-label"><strong>Référence :</strong></label>
        <input type="text" class="form-control" name="reference" id="reference" aria-describedby="reference" value="{{ $product->reference }}" placeholder="ETD-F497628FE">
    </div>
    <div class="mb-3">
        <label for="desc_product" class="form-label"><strong>Description :</strong></label>
        <textarea class="form-control" name="desc_product" id="desc_product" cols="10" rows="10" placeholder="Des écouteurs sans fil haut de gamme ...">{{ $product->desc_product }}</textarea>
    </div>

    <div>

    </div>

    <button type="submit" class="btn btn-primary">Editer le produit</button>
</form>
@endsection