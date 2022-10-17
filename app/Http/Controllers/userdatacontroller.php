<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\imports\UsersImport;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class userdatacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.userindex',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = Str::random(6);
        $user = User::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'level' => $request->level,
            'token' => $token,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('User.index');
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
        $user = User::findOrFail($id);

        return view('admin.user.useredit',compact('user'));
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
        $user = User::findOrFail($id);
    if ($request->hapustoken == !null) {
        $user->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'level' => $request->level,
            'token' => null,
            'password' => Hash::make($request->password),
        ]);
               return redirect()->route('User.index');
    }    
       if($request->generatetoken == !null){
        $token = Str::random(6);
        $user->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'level' => $request->level,
            'token' => $token,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('User.index');
    }else{
       $user->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);
               return redirect()->route('User.index');

     }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('User.index');
    }
    public function export() 
      {
    return Excel::download(new UsersExport, 'users.xlsx');
    return redirect()->route('User.index');
      }
      public function import(Request $request) 
    {
        Excel::import(new UsersImport, request()->file('excel'));
        
        return redirect()->route('User.index');
    }
    public function print($id)
    {
        $check = DB::table('users')->where('id','=',$id)->where('token','=', null)->count();
        // dd($check);
        if($check == 0){
         $user = User::findOrFail($id);
        return view('admin.user.userprint',compact('user'));
        }else{
            alert()->error('Token','Token Kosong');
            return redirect()->route('User.index');
           }       

    }
       public function printall()
    {
       $check = DB::table('users')->where('token','=', null)->whereNot(function ($query) {
                    $query->where('name', 'admin');
                })->count();
           if($check == 0){
             $users = DB::table('users')->where('level','=','siswa')->get();
             return view('admin.user.printall',compact('users'));
           }else{
            alert()->error('Token','Ada Token Yang Kosong');
            return redirect()->route('User.index');
           }
       
    }}
