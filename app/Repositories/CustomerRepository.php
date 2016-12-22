<?php

namespace App\Repositories;

use App\Entities\Customer;

class CustomerRepository
{
    public function get($id)
    {
        return Customer::find($id);
    }

    public function getByEmail($email)
    {
        return Customer::where('email', $email)->first();
    }

    public function save(Customer $customer)
    {
        $customer->save();
    }

    public function query()
    {
        return Customer::query();
    }
}
