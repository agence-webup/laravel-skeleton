<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Jobs\Category\UpdateCategory;

class EditController extends Controller
{
    private $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->get($id);
        if (!$category) {
            abort(404);
        }

        $exeptedCategories = [$category->id];
        foreach ($category->subCategories as $key => $subCategory) {
            $exeptedCategories[] = $subCategory->id;
        }

        return view('admin.category.edit', [
            'category' => $category,
            'categoriesForSelect' => $this->categoryRepo->allForSelect($exeptedCategories, true),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->dispatchNow(new UpdateCategory($id, $request->all()));
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($e->validator->errors());
        }

        return redirect()->route('admin.category.index');
    }
}
