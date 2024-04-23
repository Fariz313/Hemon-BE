<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $finished_list = Workout::whereDate('created_at', now()->today())->where('user_email', auth()->user()->email)->orderBy('created_at', 'DESC')->get();

        $workout_list = [
            ['id' => 0, 'name' => 'Jogging', 'desc' => 'Jogging selama 5 menit', 'img' => 'https://2.bp.blogspot.com/--4qsVwYbk2Q/WE6bylC7aAI/AAAAAAAAAYE/KL_j4wysgjg8rETNEbw-raysztDDtbvTgCLcB/s1600/jogging-006.jpg'],
            ['id' => 1, 'name' => 'Jumping Jacks', 'desc' => 'Jumping Jacks selama 1 menit', 'img' => 'https://www.liveenhanced.com/wp-content/uploads/2017/12/Jumping-Jacks-3-1024x683.jpg'],
            ['id' => 2, 'name' => 'Squat Jump', 'desc' => 'Squat Jump kunci selama 1 menit', 'img' => 'https://i.pinimg.com/736x/7f/06/47/7f06471cc15112ebd216b8ff00d0d536.jpg'],
            ['id' => 3, 'name' => 'Mountain Climbers', 'desc' => 'Mountain Climbers selama 1 menit', 'img' => 'https://th.bing.com/th/id/OIP.HwooFyu84xXZK9dkmgFGhgHaEK?w=273&h=180&c=7&r=0&o=5&dpr=1.4&pid=1.7'],
            ['id' => 4, 'name' => 'Burpees', 'desc' => 'Burpees selama 1 menit', 'img' => 'data:image/jpeg;base64,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'],
        ];


        return view('senam.index', [
            'title' => 'Senam',
            'workout_list' => $workout_list,
            'finished_list' => $finished_list,
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

        $finished_workout = Workout::whereDate('created_at', now()->today())->where([
            ['user_email', '=', auth()->user()->email],
            ['workout_id', '=', $request->workout_id],
        ])->first();

        if (isset($finished_workout)) {
            return redirect('/senam');
        }

        $workout = new Workout;

        $workout->workout_id = $request->workout_id;
        $workout->user_email = auth()->user()->email;

        $workout->save();

        return redirect('/senam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $workout_details = [
            '0' => ['name' => 'Jogging', 'step' => ['Posisikan badan tegak berdiri', 'Lari dengan tempo lambat', 'Atur pernapasan'], 'img' => 'https://2.bp.blogspot.com/--4qsVwYbk2Q/WE6bylC7aAI/AAAAAAAAAYE/KL_j4wysgjg8rETNEbw-raysztDDtbvTgCLcB/s1600/jogging-006.jpg'],
            '1' => ['name' => 'Jumping Jacks', 'step' => ['Posisikan badan tegak berdiri', 'Gerakkan tangan ke atas dan lompat lalu lebarkan kaki saat mendarat', 'Lompat kembali ke posisi awal'], 'img' => 'https://www.liveenhanced.com/wp-content/uploads/2017/12/Jumping-Jacks-3-1024x683.jpg'],
            '2' => ['name' => 'Squat Jump', 'step' => ['Rendahkan posisi badan dalam keadaan squat', 'Lompat setinggi mungkin', 'Mendarat dengan menekuk lutut'], 'img' => 'https://i.pinimg.com/736x/7f/06/47/7f06471cc15112ebd216b8ff00d0d536.jpg'],
            '3' => ['name' => 'Mountain Climbers', 'step' => ['Posisikan badan seperti saat melakukan plank', 'Dekatkan kaki kanan dan kaki kiri ke arah depan secara bergantian',], 'img' => 'https://th.bing.com/th/id/OIP.HwooFyu84xXZK9dkmgFGhgHaEK?w=273&h=180&c=7&r=0&o=5&dpr=1.4&pid=1.7'],
            '4' => ['name' => 'Burpees', 'step' => ['Posisikan badan tegak berdiri', 'Posisi badan plank', 'Kembali berdiri dan lompat',], 'img' => 'data:image/jpeg;base64,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'],
        ];


        return view('senam.show', [
            'title' => 'Senam',
            'workout_details' => $workout_details,
            'id' => $id,
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
}
