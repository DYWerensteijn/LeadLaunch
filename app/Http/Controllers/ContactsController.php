<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
        'name' => 'required',
        'e-mail' => 'required|email',
        'phone_number' => 'required|numeric',
        'primary_company' => 'required',
        'city' => 'required',
        'contact_owner' => 'required',
        'lead_status' => 'required',
        ]);
        $data['last_activity']=now();
        $newContact = Contacts::create($data);

        return redirect(route('contacten'));
    }
}
