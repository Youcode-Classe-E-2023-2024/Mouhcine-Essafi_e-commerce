<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produit->name }}</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            max-height: 500px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="card">
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif

            <ul>
                @foreach ($errors->all() as $error)
                <li class="alert alert-danger"> {{ $error }} </li>
                @endforeach
            </ul>
            <div class="card-header">
                <h1 class="card-title">{{ $produit->name }}</h1>
            </div>
            <div class="card-body">
                <img src="{{ asset('images\produit.jpg')}}" alt="Product Image" class="product-image img-fluid mb-3">
                <p class="card-text"><strong>Created at:</strong> {{ $produit->created_at->format('M d, Y') }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $produit->description }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $produit->quantity }}</p>
                <p class="card-text"><strong>Price:</strong> {{ $produit->price }} Dh</p>
                <!-- Back Button -->
                <a href="{{ url('/products') }}" class="btn btn-secondary mt-3">Go back</a>

                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#updateProductModal">
                    Update Product
                </button>
                <a href="/products/delete/ {{ $produit->id }}" class="btn btn-danger mt-3">Delete Product</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="updateProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your product update form goes here -->
                    <form action="/products/edit" method="POST" id="updateProductForm">
                        @csrf

                        <input type="text" class="d-none" name="id" value="{{ $produit->id }}">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="name" value="{{ $produit->name }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $produit->description }}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $produit->price }}">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $produit->quantity }}">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{url('/products/show/' . $produit->id ) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>