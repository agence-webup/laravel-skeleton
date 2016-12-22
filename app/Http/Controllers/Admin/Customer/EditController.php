<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Admin\Controller;
use App\Repositories\CustomerRepository;
use Auth;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function edit($id)
    {
        $customer = $this->customerRepo->get($id);
        if (!$customer) {
            abort(404);
        }

        Auth::guard('web')->login($customer);

        return redirect()->route('customer.dashboard');
    }
}
