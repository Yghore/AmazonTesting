@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Liste des produits')


@section('content')
    

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      @forelse ($products_list as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td><img style="width: 150px; max-height: auto;" src="{{ asset('storage/'. $product->img) }}" alt="{{ $product->img }}"></td>
          <td>{{ $product->desc_product }}</td>
          <td><a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"><i class="fas fa-edit"></i></a> | <i class="fas fa-trash"></i></td>
        </tr>
      @empty
          
      @endforelse
     
    </tbody>
  </table>

@endsection