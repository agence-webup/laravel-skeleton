<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\VerifyEmail;
use App\Jobs\Customer\UpdateEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the edit email form
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('customer.email');
    }

    /**
     * Update customer's email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->dispatchNow(new UpdateEmail($request->user()->id, $request->get('email')));

        return redirect()->route('customer.email.edit');
    }

    /**
     * Validate customer's email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        $this->dispatchNow(new VerifyEmail($request->user()->id, $request->get('email')));

        return redirect()->route('customer.email.edit');
    }
}
