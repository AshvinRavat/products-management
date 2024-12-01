@extends('layout.main')

@section('title')
    Home
@endsection

@section('content')
     <div class="container border col-4 ml-2 mt-4 p-4">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
    @error('name')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
  <div class="mb-3">
    <label for="exampleInputprice1" class="form-label">Price</label>
    <input type="text" class="form-control" id="exampleInputprice1" name="price">
    @error('price')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror   
  </div>

  <div class="mb-3">
    <label for="exampleInputprice1" class="form-label">Image</label>
    <input type="file" class="form-control" id="exampleInputprice1" name="image">
    @error('image')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
@endsection