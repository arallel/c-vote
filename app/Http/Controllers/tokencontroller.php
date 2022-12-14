<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\tokenuser;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use Faker\Factory as Faker;
use Auth;
use DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;

class tokencontroller extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'token' => ['required'],
               
        ]);
        $token =  tokenuser::where('token',$credentials)->first();
        // dd($token);
        $datacount = DB::table('token_siswa')
                ->select('token')
                ->where('token', '=', $credentials)
                ->limit(1)
                ->count();
                // foreach($token as $t){}
        if ($datacount == 1 && $token->status == 0) 
          {
              $datac = session(['id_token' => $token->token_id,'token' => $token->token]);
             return redirect()->route('user.home');
           }else{
            // Alert::error('Error Token', 'Token Salah Apabila mengalami Kesalahan Terus Hubungi Panitia');
           return view('auth.userlogin');
           }
       
    }

}
