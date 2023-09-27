<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $mails = Contact::all();
        return view('frontend.contact');
    }
    public function store(Request $request)
    {
        request()->validate([
            'message' => 'required',
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
        ]);


        $dataContact = [
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,


        ];
        Contact::create($dataContact);
        Mail::to('admin@admin.com')->send(new MailSender($dataContact));
        return redirect()->back();
    }
}
