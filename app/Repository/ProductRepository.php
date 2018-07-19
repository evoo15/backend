<?php

namespace App\Http\Repository;

use App\Produit;
use Illuminate\Http\Request;


class ProductRepository
{
    public function add(Request $request)
    {
        $produit = new Produit();
        $produit->label = $request->input('label');
        $produit->prix = $request->input('prix');
        $produit->quantite = $request->input('quantite');
        $produit->save();
        return $produit;
    }

    public function getAll()
    {
        return Produit::all();
    }

    public function getById($productId)
    {
        return Produit::find($productId);
    }

    public function delete($product)
    {
        $product->delete();
    }

    public function buy($product)
    {
        $product->quantite--;
        $product->update();
        return ($product->quantite);
    }

    public function edit($product, Request $request)
    {
        $product->label = $request->input('label');
        $product->prix = $request->input('prix');
        $product->quantite = $request->input('quantite');
        $product->update();
        $product = $this->getById($product->produit_id);
        return $product;
    }
}