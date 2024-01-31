<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/products/show.blade.php -->

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <h2>Détails du Produit</h2>

    <h3>{{ $product->name }}</h3>
    <p>{{ $product->description }}</p>
    <p>Prix : ${{ $product->price }}</p>

    <a href="{{ url('/products/'.$product->id.'/edit') }}">Modifier le Produit</a>
{{-- @endsection --}}

</body>
</html>