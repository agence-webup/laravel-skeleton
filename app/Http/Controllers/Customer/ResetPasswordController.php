<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\ResetPassword;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the password reset view
     */
    public function showResetPasswordForm()
    {
        return view('customer.reset-password');
    }

    /**
     * Reset the user's password.
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, ['password'=>'required|confirmed']);
        $this->dispatchNow(new ResetPassword($request->user()->id, $request->get('password')));

        flash()->success('Votre mot de passe a bien été modifié.');

        return redirect()->route('customer.resetPassword');
    }
}
