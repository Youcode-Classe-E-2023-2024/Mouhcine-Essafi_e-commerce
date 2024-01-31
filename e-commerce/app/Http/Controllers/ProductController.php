<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function liste_produits()
    {
        $produits = Product::all();
        return view('products.index', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_produit(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        Product::create($data);

        return redirect('/products')->with('status', 'Le produit a ete ajoute avec success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Product::find($id);
        return view('products.show', ['produit' => $produit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit = Product::find($id);
        return view('products.form-modifier', ['produit' => $produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_produit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $produit = Product::find($request->id);
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->price = $request->price;
        $produit->quantity = $request->quantity;
        $produit->update();

        return redirect('/products')->with('status', 'Le produit a ete modifie avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_produit($id)
    {
        $produit = Product::find($id);
        $produit->delete();

        return redirect('/products');
    }
}
