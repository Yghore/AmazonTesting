@extends('layouts.app')


@section('title', 'Amazon Testing | Administration')
    

@section('content')
<h1>Accueil - Administration</h1>

@if (session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
@endif
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="product-add-tab" data-bs-toggle="tab" href="#product-add" role="tab" aria-controls="product-add" aria-selected="true">Ajouter un produit</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="product-edit-tab" data-bs-toggle="tab" href="#product-edit" role="tab" aria-controls="product-edit" aria-selected="true">Editer un produit</a>
      </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ajouter un produit à un utilisateur</a>
    </li>
        <li class="nav-item" role="presentation">
      <a class="nav-link" id="image-tab" data-bs-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">Gestion des images</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="list-validate-tab" data-bs-toggle="tab" href="#list-validate" role="tab" aria-controls="list-validate" aria-selected="false">Liste à valider</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="product-add" role="tabpanel" aria-labelledby="produit-add-tab" style="padding: 10px;">
        <h1><strong>Ajouter un produit</strong> :</h1>
        <form method="POST" action="{{ route('admin_product_add') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Nom :</strong></label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Aukey EP-T31">
            </div>
            <label for="price" class="form-label"><strong>Prix :</strong></label>
            <div class="mb-3 input-group">
                <input type="number" class="form-control" name="price" id="price" aria-describedby="price" placeholder="19,99">
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





    </div>
    <div class="tab-pane fade" id="product-edit" role="tabpanel" aria-labelledby="product-edit-tab" style="padding: 10px;">
        <h1><strong>Editer un produit</strong> : </h1>





    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding: 10px;">
        <h1><strong>Ajouter un produit à un utilisateur</strong> : </h1>
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
          


  





    </div>
    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab" style="padding: 10px;">
      <h1><strong>Gestion des images</strong> : </h1>
        <h2>Ajouter une image</h2>
        <form method="POST" action="{{ route('admin_add_image') }}" enctype="multipart/form-data">
          @csrf
          <label for="img_name" class="form-label">Nom de l'image</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">{{ asset('storage/') }}/</span>
            <input type="text" class="form-control" id="img_name" name="img_name" aria-describedby="basic-addon3">
            <span class="input-group-text" id="basic-addon3">.png/.jpg/.jpeg/.gif</span>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Image (PNG, JPG, JPEG, GIF)</label>
            <input class="form-control" type="file" id="file_img" name="file_img" accept=".png,.jpg,.jpeg,.gif">
          </div>
          <button type="submit" class="btn btn-primary">Ajouter l'image</button>
        </form>
        <h2>Liste des images</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Preview</th>
              <th scope="col">Url</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($img_list as $img)
              <tr>
                <td><img style="width: 150px; max-height: auto;" src="{{ asset('storage/'. $img) }}" alt="{{ $img }}"></td>
                <td><a href="{{ asset('storage/'. $img) }}">{{ asset('storage/'. $img) }}</a></td>
              </tr>
            @empty
                <tr>
                  <td>Aucun fichier</td>
                  <td>Aucun lien ducoup...</td>
                </tr>
            @endforelse
           
          </tbody>
        </table>
        



  </div>
    <div class="tab-pane fade" id="list-validate" role="tabpanel" aria-labelledby="contact-tab" style="padding: 10px;">
        <h1><strong>Liste à valider</strong> : </h1>





    </div>
  </div>
  



@endsection