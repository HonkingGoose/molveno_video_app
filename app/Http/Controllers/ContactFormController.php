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
    //    var_dump( $request->input('firstName'));
    //    var_dump( $request->input('lastName'));
    //    var_dump( $request->input('roomNumber'));
    //    var_dump( $request->input('category'));
    //    var_dump( $request->input('message'));

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