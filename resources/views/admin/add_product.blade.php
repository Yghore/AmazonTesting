
@extends('admin.dashboard')


@section('title', 'Amazon Testing | Produits')
@section('dashboard_title', 'Dashboard - Home')


@section('content')
    @if (session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
@endif
<form method="POST" action="{{ route('admin_product_add') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label"><strong>Nom :</strong></label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Aukey EP-T31">
    </div>
    <label for="price" class="form-label"><strong>Prix :</strong></label>
    <div class="mb-3 input-group">
        <input type="number" step="0.01" min="0.01" max="800" class="form-control" name="price" id="price" aria-describedby="price" placeholder="19,99">
        <span class="input-group-text"><strong>€</strong></span>
    </div>
    <div class="mb-3">
        <label for="keywords" class="form-label"><strong>Mots clé :</strong></label>
        <input type="text" class="form-control" name="keywords" id="keywords" aria-describedby="keywords" placeholder="Ecouteur, audio, bluetooth">
    </div>
    <div class="mb-3">
        <label for="reference" class="form-label"><strong>Référence :</strong></label>
        <input type="text" class="form-control" name="reference" id="reference" aria-describedby="reference" placeholder="ETD-F497628FE">
    </div>
    <div class="mb-3">
        <label for="desc_product" class="form-label"><strong>Description :</strong></label>
        <textarea class="form-control" name="desc_product" id="desc_product" cols="10" rows="10" placeholder="Des écouteurs sans fil haut de gamme ..."></textarea>
    </div>
    <div class="mb-3">
        <label for="desc_product" class="form-label"><strong>Image :</strong></label>
        <select class="form-select" aria-label="select" name="img">
            
            @forelse ($img_list as $img)
                <option value="{{ $img }}">{{ $img }}</option>
            @empty
                <option value="nothing" select>Aucune photo</option>
            @endforelse
            </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter le produit</button>
</form>
@endsection