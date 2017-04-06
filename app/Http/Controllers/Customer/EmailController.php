<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Jobs\Customer\SendEmailVerificationMail;
use App\Jobs\Customer\UpdateEmail;
use App\Jobs\Customer\VerifyEmail;
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

        flash()->success("Un email vous a été envoyé à l'adresse ".$request->get('email').". Veuillez confirmer le changement d'adresse e-mail en cliquant sur
        le lien contenu dans cet email.");

        return redirect()->route('customer.email.edit');
    }

    /**
     * Send mail to verify customer's email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendVerification(Request $request)
    {
        $this->dispatchNow(new SendEmailVerificationMail($request->user()->id, $request->get('email')));

        flash()->success("Un email vous a été envoyé à l'adresse ".$request->get('email').".");

        return redirect()->back();
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

        flash()->success("Votre adresse e-mail a bien été validée.");

        return redirect()->route('customer.email.edit');
    }
}