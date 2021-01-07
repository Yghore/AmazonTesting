@extends('layouts.app')


@section('title', 'Amazon Testing | Login')
    

@section('content')

<div class="col"></div>
<div class="col-sm-7">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
    @endif
    <form method="POST" action="{{ route('login_post') }}">
        @csrf
        <div class="mb-3">
        <label for="email" class="form-label">Adresse email/Pseudonyme : </label>
        <input type="text" class="form-control" id="email" name="email" placeholder="john.doe@example.com/john.doe" aria-describedby="emailHelp">
        <div id="email" class="form-text">J'aime l'argent</div>
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Mot de passe : </label>
        <input type="password" name="password" placeholder="*********" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</div>
<div class="col"></div>


@endsection