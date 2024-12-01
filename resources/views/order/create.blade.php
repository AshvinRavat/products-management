@extends('layout.main')

@section('title')
    Order Create
@endsection

@section('content')
     <div class="container border col-4 ml-2 mt-4 p-4">
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Select Product</label>
    <select name="product_ids[]" class="form-control" multiple>
        @foreach ($products as $id => $name)
            <option value="{{ $id }}">
               {{ $name }}
            </option>
        @endforeach
    </select>
    @error('product_ids')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
  
  <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
@endsection