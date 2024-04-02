<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chatbot;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

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

        $payload = [
            [
                "content" => "Hello! I'm an AI assistant bot based on ChatGPT 3. How may I help you?",
                "role" => "system"
            ],
            [
                "content" => $request->message . "beri jawaban ringkas maksimal 50 kata",
                "role" => "user"
            ]
        ];

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'chatgpt-api8.p.rapidapi.com',
            'X-RapidAPI-Key' => '9888ae6205msh1b5dce721476836p14a267jsnc4bd7c0890c2',
            'content-type' => 'application/json',
        ])->post('https://chatgpt-api8.p.rapidapi.com/', $payload);

        
        $chat->user_email = 'user@mail.com';
        if($response->ok()) {
            $chat->reply = $response['text'];
            $chat->save();
        } else {
            $chat->reply = 'Mohon maaf, layanan chatbot sedang tidak dapat digunakan';
        }
        

        

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
