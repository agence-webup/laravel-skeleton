<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class IndexController extends Controller
{
    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        return view('admin.category.index', [
            'categories' => $this->categoryRepo->allParent(),
        ]);
    }
}
