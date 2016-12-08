<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index($slug = null)
    {
        $products;
        if ($slug) {
            $tags = explode('/', $slug);
            $products = $this->repo->allWithTags($tags);
        } else {
            $products = $this->repo->all();
        }

        return view('catalog.index', ['products' => $products]);
    }

    public function product($id)
    {
        $product = $this->repo->get($id);
        if (!$product) {
            abort(404);
        }

        return view('catalog.product', ['product' => $product]);
    }
}
