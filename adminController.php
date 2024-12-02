<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    function moviestore(Request $request)
    {



        $movie_name = $request->input('moviename');
        $release_year = $request->input('year');
        $genres = $request->input('genres');
        $synopsis = $request->input('synopsis');
     

        // Insert the movie data into the database

        DB::table('movie_infos')->insert([
            'movie_name' => $movie_name,
            'release_year' => $release_year,
            'genres' => $genres,
            'synopsis' => 'Avatar is  good movie',
            'category' => 'DARK',
            'image' => 'avatar.jpg',
            'video' => 'Avatar.mp4',
            'movie_clip' => 'Avatar.mp4',
        ]);
        return response()->json("OK");

    }

    function setContest(Request $request){

        $hour = $request->input('hour');
        $min = $request->input('min');
        $sec = $request->input('sec');
        
        DB::table('contesttime')->delete();


        DB::table('contesttime')->insert([
            'h' => $hour,
            'm' => $min,
            's' => $sec,
           
        ]);

        return response()->json("OK");


    }

}
