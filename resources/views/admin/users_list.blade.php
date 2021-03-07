@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Liste des utilisateurs')


@section('content')
    

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Date de création</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users_list as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at}}</td>
          <td><i class="fas fa-edit"></i> | <a href="{{ route('user_delete', $user->id)  }}"><i class="fas fa-trash"></i></a></td>
        </tr>
      @empty
      <tr>
        <td>0</td>
        <td>Aucun utilisateur</td>
        <td>--</td>
        <td>--</td>
      </tr>   
      @endforelse
     
    </tbody>
  </table>


@endsection