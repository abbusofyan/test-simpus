<?php

namespace App\Http\Controllers; // BUG: wrong namespace, should be App\Http\Controllers

// BUG: missing use Patient model
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController
{
    public function create(Request $request)
    {
        // BUG: missing validation
		$data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birthdate' => 'required|date',
        ]);

        // BUG: undefined model reference
        Patient::create($data);

        return redirect('/patients')->with('success','Patient added');
    }

    public function store()
    {
        // BUG: wrong variable name $patientsx
        $patients = Patient::select('id','name','gender','birthdate')->get();

        return view('patients.index', compact('patients'));
    }
}
