<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paslon;
use App\Models\tokenuser;
use App\Models\vote;
use App\Models\User;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;



class votingcontroller extends Controller
{
    public function index()
    {
        $paslons = paslon::all();
        return view('home', compact('paslons'));
    }
    public function store(Request $request)
    {
        $token = DB::table('users')
            ->select('token')
            ->where('token', '=', $request->token)
            ->limit(1)
            ->get();
        // dd($token);
        if ($token == !null) {
            $vote = vote::create([
                'vote_count' => '1',
                'id_paslon' => $request->id_paslon,
            ]);
            $data = tokenuser::find($request->id_user);
            //  dd($data);
            if ($data->status == 0) {
                $data->status = 1;
                $data->save();
                return redirect()->route('userlogin');
            } else {
                return redirect()->route('userlogin');
            }
        } else {
            return view('auth.userlogin');
        }
    }
    public function golput(Request $request)
    {
        $data = tokenuser::find($request->token_id);
        $data->status = 1;
        $data->save();
        return redirect()->route('userlogin');
    }
}
