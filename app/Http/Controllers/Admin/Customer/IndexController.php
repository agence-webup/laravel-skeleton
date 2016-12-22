<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Admin\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class IndexController extends Controller
{
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function datatable(Request $request)
    {
        $query = $this->customerRepo->query();
        $query->select('id', 'lastname');

        return Datatables::of($query)
            ->addColumn('actions', function ($customer) {
                return view('admin.customer.datatable-actions', ['customer' => $customer])->render();
            })
            ->make(true);
    }
}
