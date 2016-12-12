<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Jobs\Category\DeleteCategory;

class DestroyController extends Controller
{
    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function destroy($id)
    {
        try {
            $this->dispatchNow(new DeleteCategory($id));
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($e->validator->errors());
        }

        return redirect()->route('admin.category.index');
    }
}
