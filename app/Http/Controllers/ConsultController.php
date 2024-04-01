<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('consult.index', [
            'title' => 'Konsultasi',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $chat = new Consult;

        $chat->message = $request->message;
        $chat->sender_role = $request->sender_role;
        $chat->user_email = 'user@mail.com';
        $chat->doctor_email = 'doctor@mail.com';

        $chat->save();

        return redirect('/consult');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        return view('consult.show', [
            'title' => 'Konsultasi',
        ]);
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

    public function start(Request $request)
    {
        $chats = Consult::where('user_email', $request->user_email)->get();

        return view('consult.start', [
            'title' => 'Konsultasi',
            'user_email' => $request->user_email,
            'doctor_email' => $request->doctor_email,
            'me' => $request->me,
            'chats' => $chats,
        ]);
    }
}
