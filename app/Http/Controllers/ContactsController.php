<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::paginate(5);

        return view('contacten', ['contacts' => $contacts]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'primary_company' => 'required',
            'city' => 'required',
            'contact_owner' => 'required',
            'lead_status' => 'required',
        ]);
        $data['last_activity'] = now();
        $newContact = Contacts::create($data);

        return redirect(route('contacten'));
    }

    public function edit(Contacts $contacts)
    {
        return view('contacten.edit', ['contact' => $contacts]);
    }

    public function editHandler(Request $request, $contacts)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'primary_company' => 'required',
            'city' => 'required',
            'contact_owner' => 'required',
            'lead_status' => 'required',
        ]);

        Contacts::where('id', $contacts)
            ->limit(1)
            ->update($data);

        return redirect(route('contacten'));
    }

    //limit (1) makes it so I can only delete one (better safe than sorry)
    public function destroy($contacts)
    {
        Contacts::where('id', $contacts)
            ->limit(1)
            ->delete();

        return redirect(route('contacten'));
    }
}
