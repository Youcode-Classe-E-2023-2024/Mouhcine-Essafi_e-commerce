<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>liste des produits</h1>
    <div class="container text-center">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="col s12">
                <hr>
                <a href="/products/create" class="btn btn-primary">ajouter un produit</a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>description</th>
                            <th>price</th>
                            <th>quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                        <tr>
                            <td> {{ $produit->name }} </td>
                            <td> {{ $produit->description }} </td>
                            <td> {{ $produit->price }} </td>
                            <td> {{ $produit->quantity }} </td>
                            <td>
                                <a href="/products/edit/ {{ $produit->id }} " class="btn btn-info">Update</a>
                                <a href="/products/delete/ {{ $produit->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>