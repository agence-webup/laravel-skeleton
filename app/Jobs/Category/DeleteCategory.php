<?php

namespace App\Jobs\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\CategoryRepository;

class DeleteCategory implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepository $categoryRepo)
    {
        $category = $categoryRepo->get($this->id);
        if ($category) {
            foreach ($category->subCategories as $key => $subCategory) {
                $subCategory->category_id = null;
                $subCategory->level -= 1;
                $categoryRepo->save($subCategory);
            }
            $categoryRepo->delete($category);
        }
    }
}
