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

        $assessments = Assessment::orderBy('created_at', 'DESC')->where('user_email', auth()->user()->email)->get();
        return view('assessment.history', [
            'title' => 'Riwayat Asesmen',
            'assessments' => $assessments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('assessment.create');
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

        $assessment = new Assessment;

        $assessment->age = $request->age;
        $assessment->blood_pressure = $request->blood_pressure;
        $assessment->cholesterol = $request->cholesterol;
        $assessment->blood_sugar = $request->blood_sugar;
        $assessment->result = 'Positif';
        
        
        $assessment->user_email = auth()->user()->email;

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
