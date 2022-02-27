<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('manage.contact.index');
    }

    public function create()
    {
        return view('manage.contact.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required',
            'link' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact has been added');
    }

    public function edit(Contact $contact)
    {
        return view('manage.contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'icon' => 'required',
            'link' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact has been edited');
    }
    

    public function destroy(Contact $contact) 
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact has been deleted');
    }
}
