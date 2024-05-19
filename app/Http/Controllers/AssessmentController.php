<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if (request()->segment(1) == 'api') {
            $assessments = Assessment::orderBy('created_at', 'DESC')->get();
            return response()->json([
                'error' => false,
                'list' => $assessments,
            ]);
        }   

        $assessments = Assessment::orderBy('created_at', 'DESC')->where('user_email', auth()->user()->email)->get();
        return view('assessment.history', [
            'title' => 'Riwayat Asesmen',
            'assessments' => $assessments,
            'user' => auth()->user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('assessment.create', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'age' => 'required|integer|min:0|max:150',
            'blood_pressure' => 'required|integer|min:0|max:1000',
            'cholesterol' => 'required|integer|min:0|max:1000',
            'blood_sugar' => 'required|integer|min:0|max:1000',
        ]);

        $result = '';

        $hasil = 0;

        if ($request->age < 45) {
            $hasil += 0;
        } else if ($request->age >= 45 && $request->age <= 65) {
            $hasil += 1;
        } else {
            $hasil += 2;
        }

        
        if ($request->cholesterol < 200) {
            $hasil += 0;
        } else if ($request->cholesterol >= 200 && $request->cholesterol <= 240) {
            $hasil += 1;
        } else {
            $hasil += 2;
        }

        if ($request->blood_pressure < 120) {
            $hasil += 0;
        } else if ($request->blood_pressure >= 120 && $request->blood_pressure <= 140) {
            $hasil += 1;
        } else {
            $hasil += 2;
        }

        if ($request->blood_sugar < 100) {
            $hasil += 0;
        } else if ($request->blood_sugar >= 100 && $request->blood_sugar <= 125) {
            $hasil += 1;
        } else {
            $hasil += 2;
        }

        if ($hasil > 5) {
            $result = "Positif";
        } else {
            $result = "Negatif";
        }

        $assessment = new Assessment;

        $assessment->age = $request->age;
        $assessment->blood_pressure = $request->blood_pressure;
        $assessment->cholesterol = $request->cholesterol;
        $assessment->blood_sugar = $request->blood_sugar;

        
        $assessment->result = $result;
        
        $assessment->user_email = '';
        if (request()->segment(1) == 'api') {
            $assessment->user_email = $request->email;
        } else {
            $assessment->user_email = auth()->user()->email;
        }
        

        $assessment->save();

        return redirect('/assessment')->with('message', 'Asesmen berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
