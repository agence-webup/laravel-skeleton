<?php

namespace App\Jobs\Product;

use App\Entities\Product;
use App\Repositories\ProductRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;
use Validator;

class CreateProduct implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $data;

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
    public function handle(ProductRepository $productRepo)
    {
        $validator = $this->getValidator($this->data);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $product = new Product();
        $product->fill($validator->getData());
        $product->translate('fr')->fill($validator->getData());
        $productRepo->save($product);
    }

    private function getValidator(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'reference' => 'required',
            'price' => 'required|numeric',
        ]);

        $validator->after(function ($validator) {
            if ($validator->errors()->count()) {
                return;
            }

            $data = $validator->getData();

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
