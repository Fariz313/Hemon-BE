<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $opposite_role = '';
        if (auth()->user()->role == 'user') {
            $opposite_role = 'doctor';
        } else {
            $opposite_role = 'user';
        }
        $opposite_users = User::where('role', $opposite_role)->get();
        return view('consult.index', [
            'title' => 'Konsultasi',
            'user' => auth()->user(),
            'opposite_users' => $opposite_users,
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
        // $chat->user_email = 'user@mail.com';
        $chat->user_email = $request->user_email;
        // $chat->doctor_email = 'doctor@mail.com';
        $chat->doctor_email = $request->doctor_email;


        $chat->save();

        return redirect('/consult');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        // return view('consult.show', [
        //     'title' => 'Konsultasi',
        // ]);
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
        $chats = Consult::where([
            ['user_email', '=', $request->user_email],
            ['doctor_email', '=', $request->doctor_email],
        ])->get();

        return view('consult.start', [
            'title' => 'Konsultasi',
            'user_email' => $request->user_email,
            'doctor_email' => $request->doctor_email,
            'me' => auth()->user()->role,
            'chats' => $chats,
            'user' => auth()->user(),
        ]);
    }
}
