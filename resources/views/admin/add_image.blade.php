@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Home')


@section('content')

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


@endsection