@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Home')


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
      @forelse ($validate_list as $validate)
        <tr>
          <td>{{ $validate->username }}</td>
          <td>{{ $validate->productname }}</td>
          @switch($validate->step)
          @case(0)
            <td class="card-subtitle mb-2" style="color:  rgb(241, 105, 105);">Non commandé</td>
            @break
          @case(1)
            <td class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non reçu</td>
            @break
          @case(2)
            <td class="card-subtitle mb-2" style="color:   rgb(255, 169, 31);">Non noté</td>
            @break
         @case(3)
           <td class="card-subtitle mb-2" style="color: rgb(137, 241, 105);">Validé</td>
            @break
         @case(4)
            <td class="card-subtitle mb-2"  style="color:rgb(241, 105, 105);">Refusé</td>
             @break
          @default
          <td class="card-subtitle mb-2" style="color:rgb(241, 105, 105);">Erreur</td>
        @endswitch
        <td><img style="width: 150px; max-height: auto;" src="{{ asset('storage/'. $validate->img) }}" alt="{{ $validate->img }}"></td>
        <td>{{ $validate->updated_at }}</td>
        <td>{{ $validate->information }}</td>
        <td> <a href="{{ route('admin_validate_step', $validate->id) }}" role="button" class="btn btn-success" style="margin-top: 3px;">Valider</a>
        <a href="{{ route('admin_error_step', $validate->id) }}" role="button" class="btn btn-danger" style="margin-top: 3px;">Erreur</a></td>
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
