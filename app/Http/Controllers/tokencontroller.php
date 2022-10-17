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
        $token =  User::where('token', $credentials)->select('token','id')->get();
        // dd($token);
        $datacount = DB::table('users')
                ->select('token')
                ->where('token', '=', $credentials)
                ->limit(1)
                ->count();
        if ($datacount == 1) 
          {
            foreach ($token as $d) {
                    $datac = session(['id_token' => $d->id,'token' => $d->token]);
        } 
             return redirect()->route('user.home');
           }else{
            Alert::error('Error Token', 'Token Salah Apabila mengalami Kesalahan Terus Hubungi Panitia');
           return view('auth.userlogin');
           }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
