<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chatbot;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $chats = Chatbot::get();
        return view('chatbot.index', [
            'title' => 'Chatbot',
            'chats' => $chats,
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

        $chat = new Chatbot;

        $chat->message = $request->message;
        $chat->reply = 'Tetap jaga kesehatan ya!';
        $chat->user_email = 'user@mail.com';

        $chat->save();

        return redirect('/chatbot');
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
