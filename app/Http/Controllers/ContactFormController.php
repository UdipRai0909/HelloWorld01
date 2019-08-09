<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Session;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        

        Mail::to('test@gmail.com')->send(new ContactFormMail($data)); 
        Session()->flash('message','Your message has been sent!');
        return redirect('contact'); 
            // -> with('message', 'Your message has been sent.') ;
    }
}
