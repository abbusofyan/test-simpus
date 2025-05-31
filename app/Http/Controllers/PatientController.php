
<?php

namespace App\Controllers; // BUG: wrong namespace, should be App\Http\Controllers

// BUG: missing use Patient model
use Illuminate\Http\Request;

class PatientController
{
    public function create(Request $request)
    {
        // BUG: missing validation
        $data = $request->all();
        // BUG: undefined model reference
        Patient::create($data);

        return redirect('/patients')->with('success','Patient added');
    }

    public function store()
    {
        // BUG: wrong variable name $patientsx
        $patients = Patient::select('id','name','gender','birthdate')->get();

        return view('patients.index', compact('patientsx'));
    }
}
