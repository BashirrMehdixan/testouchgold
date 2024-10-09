<?php

namespace App\Http\Controllers\ContactController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function store(ContactRequest $request)
    {
        try {
            Mail::to('info@testouchgold.com')->send(new Contact($request->all()));
            return redirect()->back()->with('success', 'Message sent successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($request)->withInput();
        }
    }
}
