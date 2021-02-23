@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Ajouter un produit à un utilisateur')


@section('content')
    
<form method="POST" action="{{ route('admin_add_product_user') }}">
    @csrf
    <div class="mb-3">
        <label for="desc_product" class="form-label"><strong>Produit :</strong></label>
        <select class="form-select" aria-label="select" name="product">
          @forelse ($products_list as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
          @empty
            <option value="nothing">Aucun produit</option>
           @endforelse
          </select>
    </div>
    <div class="mb-3">
        <label for="desc_product" class="form-label"><strong>Utilisateur :</strong></label>
        <select class="form-select" aria-label="select" name="user">
            @forelse ($users_list as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @empty
                <option value="nothing">Aucun utilisateur</option>
            @endforelse
          </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter le produit à l'utilisateur</button> 
  </form>
  <h2>Liste des produits :</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products_list as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td><img style="width: 150px; max-height: auto;" src="{{ asset('storage/'. $product->img) }}" alt="{{ $product->img }}"></td>
          <td>{{ $product->desc_product }}</td>
        </tr>
      @empty
          
      @endforelse
     
    </tbody>
  </table>
  






@endsection