@extends('layout.main')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <table class="table table-striped m-4 col-4 border w-50">
  <thead>
    <tr>
      <th scope="col">Customer</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>
                    {{ auth()->user()->name }}
                </td>
                <td>
                    {{ $order->total }}
                    @foreach ($order->orderItems as $orderItem)
                    <p>
                        Product: {{ $orderItem->product->name }}
                        Price: {{ $orderItem->product->price }}
                        Quantity: {{ $orderItem->quantity }}
                    </p>
                    @endforeach
                </td>
            </tr>
        @endforeach
  </tbody>
</table>
    </div>
@endsection