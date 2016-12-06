<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Controller;
use App\Entities\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->all();
        
        return view('admin.product.index', compact('products'));
    }
}
