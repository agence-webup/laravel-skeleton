<?php

namespace App\Jobs\Category;

use App\Entities\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Validator;

class CreateCategory implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    private $categoryRepo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $validator = $this->getValidator($this->data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $category = new Category();
        $category->fill($validator->getData());
        $category->translate('fr')->fill($validator->getData());
        $this->categoryRepo->save($category);
    }

    private function getValidator(array $data)
    {
        $validator = Validator::make($data, [
            'category_id' => '',
            'published' => '',
            'level' => '',
            // 'position' => 'required',
            'title' => 'required',
            'description' => 'required',
            'metaTitle' => 'required',
            'metaDescription' => 'required',
            'metaKeywords' => 'required',
            // 'slug' => 'required',
        ]);

        $validator->after(function ($validator) {
            if ($validator->errors()->count()) {
                return;
            }

            $data = $validator->getData();

            if (isset($data['published']) && $data['published'] == "on") {
                $data['published'] = true;
            } else {
                $data['published'] = false;
            }

            if ($data['category_id'] == "") {
                $data['category_id'] = null;
                $data['level'] = 1;
            } else {
                $parentCategory = $this->categoryRepo->get($data['category_id']);
                $data['level'] = $parentCategory->level + 1;
            }

            $data['position'] = 0;//Get last Position

            // supprime les clées qui ne sont pas validées
            foreach ($data as $key => $value) {
                if (!array_key_exists($key, $validator->getRules())) {
                    unset($data[$key]);
                }
            }

            $validator->setData($data);
        });

        return $validator;
    }
}
