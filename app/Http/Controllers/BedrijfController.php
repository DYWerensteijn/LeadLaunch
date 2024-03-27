<?php

namespace App\Http\Controllers;

use App\Models\Bedrijven;
use Illuminate\Http\Request;

class BedrijfController extends Bedrijven
{

    public function index()
    {
        // paginate is a function that makes it so the table only shows my chosen amount of records
        $bedrijven = Bedrijven::paginate(5);
        return view('bedrijven', ['bedrijven'=>$bedrijven]);
    }

    public $timestamps = false;

    public function store(Request $request){

        $data = $request->validate([
        'naam' => 'required',
        'bedrijfseigenaar' => 'required',
        'straat' => 'required',
        'huisnummer' => 'required',
        'postcode' => 'required',
        'branche' => 'required'
        ]);
        $data['ldatum aanmaak']=now();
        $data['ldatum laatste activiteit']=now();
        $newBedrijf = Bedrijven::create($data);

        return redirect(route('bedrijven'));
    }
    public function edit(Bedrijven $bedrijven){
        return view('bedrijven.edit', ['company' => $bedrijven]);
    }

    public function editHandler(Request $request, $bedrijven){
        //checks if the form is completeley filled. Else it gives me an Error message
        $data = $request->validate([
            'naam' => 'required',
            'bedrijfseigenaar' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'branche' => 'required'
        ]);
        //if everything is filled in correctly, the database gets changed
        Bedrijven::where('id', $bedrijven)
            ->limit(1)
            ->update($data);
        return redirect(route('bedrijven'));
    }
        //limit (1) makes it so I can only delete one (better safe than sorry)
    public function deleteBedrijf($bedrijven){
        Bedrijven::where('id', $bedrijven)
            ->limit(1)
            ->delete();

        return redirect(route('bedrijven'));
    }
}
