<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ActivateYourAccrount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{
    //
    public function ActivationUserAccount($code){
        $user = User::whereCode($code)->first();
        $user->code = null;
        $user->active =1;
        /*$user->update([
            "active" => 1
        ]);*/
        $user->save();
        Auth::login($user);
        return redirect("/login")->withSuccess("connecte ");
    }

    //send email to activate to suer account
    public function ResendActivationCode($email){

        $user = User::whereEmail($email)->first();
        if ($user->active) {
            return redirect("/");
        }
        Mail::to($user)->send(new ActivateYourAccrount($user->code));
        return redirect("/login")->withSuccess("Activation link sent");
    }
}
