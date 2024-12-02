<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\memeinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class MemeController extends Controller
{


    function allData()
    {


        $allmemes = DB::table('memeinfos')->orderBy('Time', 'desc')->get();
        $winner = DB::table('winners')->orderBy('date', 'desc')->first();


        $names = [];
        $index = 0;
        foreach ($allmemes as $meme) {

            $row = DB::table('users')
                ->where('email', $meme->email)
                ->select('*')
                ->first();

            if ($row) {

                $names[$index] = $row->name;
                $index++;
            }
        }



        $data = [];
        $data[0] = $allmemes;
        if ($winner) {
            $data[2] = $winner;
        }


        $data[1] = $names;


        return response()->json($data);
    }

    function memestore(Request $request)
    {
        $image = $request->input('memeimg');
        $image = str_replace('C:\\fakepath\\', '', $image);


        $memetitle = $request->input('memetitle');


        DB::table('memeinfos')->insert([
            'PostImg' => $image,
            'PostLike' => 0,
            'memetitle' => $memetitle,
            'Time' => now(),
            'email' => session('email'),
            'isvote' => 0
        ]);



        return response()->json(['status' => 'ok']);
    }

    function vote($time)
    {

        $myemail = session('email');

        $row = DB::table('memeinfos')
            ->where('Time', $time)
            ->select('*')
            ->first();

        $memevotecount = $row->PostLike;

        $votetracking = DB::table('votetracking')
            ->where('time', $time)
            ->where('postOwnerEmail', $myemail)
            ->select('*')
            ->first();


        if ($votetracking) {

            DB::table('votetracking')

                ->where('time', $time)
                ->where('postOwnerEmail', '=', $myemail)
                ->delete();
            DB::table('memeinfos')
                ->where('Time', $time)
                ->update(['PostLike' => $memevotecount - 1]);
        } else {

            DB::table('votetracking')->insert([
                'time' => $time,
                'postOwnerEmail' => $myemail
            ]);

            DB::table('memeinfos')
                ->where('Time', $time)
                ->update(['PostLike' => $memevotecount + 1]);
        }

        return response()->json($time);
    }

    function ckvote($time)
    {

        $myemail = session('email');



        $votetracking = DB::table('votetracking')
            ->where('time', $time)
            ->where('postOwnerEmail', $myemail)
            ->select('*')
            ->first();

        if ($votetracking) {

            return response()->json(['status' => '<i class="fa fa-thumbs-down"></i>']);
        } else {

            return response()->json(['status' => '<i class="fa fa-thumbs-up"></i>']);
        }
    }

    function topmeme()
    {

        $allmemes = memeinfo::all();
        if ($allmemes) {

            $mm = -1;
            $ans = [];
            foreach ($allmemes as $meme) {

                if ($meme->PostLike > $mm) {
                    $mm = $meme->PostLike;
                    $ans = $meme;
                }
            }

            if ($mm != -1) {
                return response()->json($ans);
            }
            else{
                return response()->json("not OK");

            }
        }
    }

    function gettime()
    {

        $contesttime = DB::table('contesttime')->get();

        // $data['h']=$contesttime->h;
        // $data['m']=$contesttime->m;
        // $data['s']=$contesttime->s;

        return response()->json($contesttime);
    }

    function Endcontest()
    {

        $allmemes = memeinfo::all();

        if ($allmemes) {

            $mm = -1;
            $ans=[];

            foreach ($allmemes as $meme) {

                if ($meme->PostLike > $mm) {
                    $mm = $meme->PostLike;
                    $ans = $meme;
                }
            }

            if ($mm!=-1) {

                $winner = $ans->email;
                $memeimg = $ans->PostImg;

                $row = DB::table('users')
                    ->where('email', $winner)
                    ->select('*')
                    ->first();

                if ($row) {

                    $winnername = $row->name;

                    DB::table('winners')->insert([
                        'name' => $winnername,
                        'memeimg' => $memeimg,

                    ]);
                }
            }

            DB::table('memeinfos')->delete();
        }





        return response()->json("OK");
    }
}
