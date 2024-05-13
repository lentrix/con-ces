<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PatientController extends Controller
{
    public function index() {

        $patients = Patient::orderBy('updated_at','DESC')->orderBy('last_name')->orderBy('first_name')->limit(10)->get();

        return Inertia::render('Patients/Index',[
            'patients' => $patients,
            'title' => 'Recent Patients'
        ]);

    }

    public function search(Request $request) {
        $patients = Patient::where('last_name','like',"%$request->key%")
                ->orWhere('first_name','like',"%$request->key%")
                ->orderBy('last_name')->orderBy('first_name')
                ->get();

        return Inertia::render('Patients/Index', [
            'patients' => $patients,
            'title' => "Search Results for $request->key"
        ]);
    }

    public function show(Patient $patient) {
        $patient->load('services');
        return Inertia::render('Patients/Show', compact('patient'));
    }

    public function addService(Patient $patient) {
        return Inertia::render('Patients/AddService', compact('patient'));
    }

    public function recordService(Patient $patient, Request $request) {
        $request->validate([
            'date' => 'required',
            'complaints' => 'required',
            'temp' => 'required'
        ]);

        Service::create($request->all());

        return redirect('/patients/'.$request->patient_id);
    }

    public function deleteService(Service $service) {
        $patient = $service->patient;

        $service->delete();

        return redirect('/patients/' . $patient->id);
    }

    public function create() {
        return Inertia::render('Patients/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'case_no' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ]);

        $patient = Patient::create($request->all());

        return redirect('/patients/' . $patient->id);
    }
}
