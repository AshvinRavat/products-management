@extends('layout.main')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <table class="table table-striped m-4 col-4 border w-50">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    <img src="{{ asset('storage/' . $product->image ) }}" width="100px">
                </td>
                <td>
                    <a href="{{ route('product.edit', ['product' => $product]) }}">
                        Edit
                    </a>
                    <form action="{{ route('product.delete', ['product' => $product]) }}" method="POST">
                        @csrf
                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
  </tbody>
</table>
    </div>
@endsection