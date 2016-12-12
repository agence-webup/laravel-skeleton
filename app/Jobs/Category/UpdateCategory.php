<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use App\Repositories\CategoryRepository;
use App\Entities\Category;
use Validator;

class UpdateCategory implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $id;
    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepository $categoryRepo)
    {
        $category = $categoryRepo->get($this->id);
        if (!$category) {
            throw new ModelNotFoundException();
        }

        $validator = $this->getValidator($this->data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $category->fill($validator->getData());
        $category->translate('fr')->fill($validator->getData());
        $categoryRepo->save($category);
    }

    private function getValidator(array $data)
    {
        $validator = Validator::make($data, [
            'category_id' => '',
            'published' => '',
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
