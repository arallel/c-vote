<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paslon;
use App\Models\vote;
use App\Models\User;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;


class votingcontroller extends Controller
{
    public function index()
    {
        $paslons = paslon::all();
        return view('home',compact('paslons'));
    }
    public function store(Request $request)
    {
        $token = DB::table('users')
                ->select('token')
                ->where('token', '=', $request->token)
                ->limit(1)
                ->get();
         // dd($token);
        if($token == !null){
             $vote = vote::create([
            'vote_count' => '1',
            'id_paslon' => $request->id_paslon,
        ]);
         $data = User::find($request->id_user);
         $data->token = NULL;
         $data->save();
         return redirect()->route('userlogin');
     }else{
         Alert::error('Error Token', 'Token Salah Apabila mengalami Kesalahan Terus Hubungi Panitia');
         return view('auth.userlogin');
     }
       
         
    }
}
