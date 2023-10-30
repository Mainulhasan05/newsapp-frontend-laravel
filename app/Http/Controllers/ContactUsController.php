<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'string',
            'subject' => 'string',
            'message' => 'string',
        ]);

        // Create a new ContactUs model and fill it with the validated data
        $contact = new ContactUs;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');

        // Save the contact form data to the database
        $contact->save();

        // Optionally, you can redirect the user to a thank you page or any other appropriate response
        return redirect()->route('contact'); // 'thankyou' should be replaced with the actual route name

        // You may also add error handling and validation error messages if needed
    }
}
