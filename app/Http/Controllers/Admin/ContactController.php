<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    private $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $contact = $this->model::all();
        return view('admin.modules.contact.list',compact('contact'));
    }

    public function updateStatus($id)
    {
        $contact = Contact::findOrFail($id);
        
        // Update status to replied
        $contact->status = 1;
        $contact->save();
        return redirect()->back()->with('success', 'Status updated and email sent!');
    }
}
