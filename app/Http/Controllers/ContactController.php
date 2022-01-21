<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Mail\contact;
use App\Mail\contactSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.website.contact');
    }

    public function sendContactMail(contactRequest $request)
    {
        $data = $request->all();
        Mail::to(env("OWNER_MAIL"))->send(new contact($data));
        Mail::to($data['email'])->send(new contactSender($data));
        return redirect()->back()->with(['success' => 'We hebben uw bericht ontvangen']);

    }
}
