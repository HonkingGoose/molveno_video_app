<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\ContactForm;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Mail\ContactFormEmail;
use Mail;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('contact.form');
    }

    /**
     * Generate a new contact form.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function send(Request $request)
    {
        $request->validate([
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'roomNumber' => 'required|integer'
        ]);

        $contact_form = new ContactForm();
        $contact_form->firstName = $request->input('firstName');
        $contact_form->lastName = $request->input('lastName');
        $contact_form->roomNumber = $request->input('roomNumber');
        $contact_form->category = $request->input('category');
        $contact_form->message = $request->input('message');

        if ($contact_form->save()) {
            Mail::to('admin@molveno.it')->send(new ContactFormEmail($contact_form));
            return view('contact.sentSuccessfully');
        } else {
            return view('contact.form');
        }
    }

    /**
     * If the contact form is successfully sent, return a 'success' view.
     *
     * @return Application|Factory|View
     */
    public function sentSuccessfully()
    {
        return view('contact.sentSuccessfully');
    }

}
