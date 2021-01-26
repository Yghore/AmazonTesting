@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Product')


@section('content')
    

<table class="table">
    <thead>
      <tr>
        <th scope="col">Utilisateur</th>
        <th scope="col">Produit</th>
        <th scope="col">Etape</th>
        <th scope="col">Image</th>
        <th scope="col">Dernière modification</th>
        <th scope="col">Information</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
        <tr>
          <td>{{ $product->username }}</td>
          <td>{{ $product->productname }}</td>
          @switch($product->step)
          @case(0)
          <td class="card-subtitle mb-2" style="color:  rgb(241, 105, 105);">Non commandé</td>
          @break
        @case(1)
          <td class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non reçu</td>
          @break
        @case(2)
          <td class="card-subtitle mb-2" style="color:    rgb(137, 241, 105);">En attente de la demande de l'avis</td>
          @break
       @case(3)
         <td class="card-subtitle mb-2" style="color: rgb(255, 169, 31);">Non noté</td>
          @break
        @case(4)
          <td class="card-subtitle mb-2" style="color: rgb(137, 241, 105);">Terminé</td>
           @break
       @case(5)
          <td class="card-subtitle mb-2"  style="color:rgb(241, 105, 105);">Refusé</td>
           @break
        @default
        <td class="card-subtitle mb-2" style="color:rgb(241, 105, 105);">Erreur</td>
      @endswitch
        <td><img style="width: 150px; max-height: auto;" src="{{ asset('storage/'. $product->img) }}" alt="{{ $product->img }}"></td>
        <td>{{ $product->updated_at }}</td>
        <td>{{ $product->information }}</td>
            <td> <a href="{{ route('admin_delete_productuser', $product->id) }}" role="button" class="btn btn-danger" style="margin-top: 3px;">Supprimer</a>
            <a href="{{ route('admin_error_step', $product->id) }}" role="button" class="btn btn-warning" style="margin-top: 3px;">Erreur</a></td>

        </tr>
      @empty
          <tr>
            <td>Aucune étape à valider</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>
      @endforelse
     
    </tbody>
  </table>      
@endsection