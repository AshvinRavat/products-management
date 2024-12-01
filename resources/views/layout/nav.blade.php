<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      {{ env('APP_NAME') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('product.index') }}">List</a></li>
            <li><a class="dropdown-item" href="{{ route('product.create') }}">Create</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Orders
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('order.index') }}">List</a></li>
            <li><a class="dropdown-item" href="{{ route('order.create') }}">Create</a></li>
          </ul>
        </li>

      </ul>
      <form action="{{ route('logout') }}" method="POST">
        Welcome, {{ auth()->user()->name }}
           @csrf
            <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
    </div>
  </div>
</nav>