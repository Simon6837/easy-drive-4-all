<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('pages.website.contact');
    }
    public function storeContactForm(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin

        Mail::send('emails.contactMail', array(

            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'msg' => $input['message'],

            ), function($message) use ($request){

                $message->from($request->email);
                $message->to('admin@admin.com', 'Admin')->subject($request->get('subject'));

            });

        return redirect()->back()->with(['success' => 'We hebben uw bericht ontvangen']);

    }
}
