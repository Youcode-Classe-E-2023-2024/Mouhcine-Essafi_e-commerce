<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>

<body>
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
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
                <h2>ALL <b>Products</b></h2>
                <!-- Button to trigger modal -->
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                        Add Product
                    </button>
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators" id="carousel-indicators"></ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner" id="carousel-inner">
                        @foreach ($produits->chunk(4) as $chunk)
                        <div class="item carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $produit)
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="{{ asset('images\produit.jpg')}}" class="img-fluid" alt="{{ $produit->name }}">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>{{ $produit->name }}</h4>
                                            <p class="item-price">
                                                <strike>{{ $produit->price }}DH</strike>
                                                <b>{{ $produit->price }}DH</b>
                                            </p>
                                            <a href="{{url('/products/show/' . $produit->id ) }}" class="btn btn-primary">Details</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your product form goes here -->
                    <form action="/products/create" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>