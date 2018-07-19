<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProductRepository;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $productRepository;

    function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function add(Request $request)
    {
        $produit = $this->productRepository->add($request);
        return response()->json($produit);
    }

    public function getAll()
    {
        return response()->json($this->productRepository->getAll());
    }

    public function getById($productId)
    {
        if (!$product = $this->productRepository->getById($productId)) {
            return response()->json(['error' => 'product not found'], 404);
        }
        return response()->json($product);
    }

    public function delete($productId)
    {
        if (!$product = $this->productRepository->getById($productId)) {
            return response()->json(['error' => 'product not found'], 404);
        }
        $this->productRepository->delete($product);
    }

    public function buy($productId)
    {
        if (!$product = $this->productRepository->getById($productId)) {
            return response()->json(['error' => 'product not found'], 404);
        } else if ($product->quantite < 1) {
            return response()->json(['error' => 'product not available'], 500);
        }
        return response()->json($this->productRepository->buy($product));
    }

    public function edit($productId, Request $request)
    {
        if (!$product = $this->productRepository->getById($productId)) {
            return response()->json(['error' => 'product not found'], 404);
        }
        if (!$produit = $this->productRepository->edit($product, $request))
            return response()->json(['error' => 'can\'t edit'], 401);
        return response()->json($produit);
    }
}