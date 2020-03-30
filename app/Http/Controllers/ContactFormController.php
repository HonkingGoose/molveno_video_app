<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.form');
    }

    public function send(Request $request)
    {

        $contact_form = new ContactForm();
        $contact_form->firstName = $request->input('firstName');
        $contact_form->lastName = $request->input('lastName');
        $contact_form->roomNumber = $request->input('roomNumber');
        $contact_form->category = $request->input('category');
        $contact_form->message = $request->input('message');

        if ($contact_form->save()) {
            return view('contact.sentSuccessfully');
        } else {
            return view('contact.form');
        }      
    }

    public function sentSuccessfully()
    {
        return view('contact.sentSuccessfully');
    }

}