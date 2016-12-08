<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class IndexController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        return view('admin.product.index', [
            'products' => $this->productRepo->all(),
        ]);
    }
}
