<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Jobs\Category\CreateCategory;
use App\Entities\Category;

class CreateController extends Controller
{
    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'category' => new Category(),
            'categoriesForSelect' => $this->categoryRepo->allForSelect(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->dispatchNow(new CreateCategory($request->all()));
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($e->validator->errors());
        }

        return redirect()->route('admin.category.index');
    }
}
