<?php

namespace App\Http\Controllers;

use App\Mail\mailnewletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function sendMail(Request $request)
    {
        request()->validate([
            "yarbi" => ["required"],
        ]);

        Mail::to($request->yarbi)->send(new mailnewletter());

        return redirect()->back();
    }
}
