<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>Ajoute un produit</h1>
    <div class="container text-center">
        <div class="row">

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

            <form action="/products/create/traitement" method="POST" class="form-group">
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
                <hr>
                <button type="submit" class="btn btn-primary">ajouter</button>
                <a href="/products" class="btn btn-secondary">Cancel</a>
                <hr>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>