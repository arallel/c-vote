<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\tokenuser;
use App\Models\kelas;
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
        $users = tokenuser::all();
        return view('admin.user.userindex', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelass = kelas::all();
        return view('admin.user.usercreate', compact('kelass'));
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
        $user = tokenuser::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'token' => $token,
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
        $kelas = tokenuser::findOrFail($id);
        $kelass = kelas::all();
        return view('admin.user.useredit', compact('kelas', 'kelass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $token_id)
    {
        $user = tokenuser::findOrFail($token_id);
        // dd($request->status);
        if ($request->hapustoken == !null) {
            $user->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'status' => 1,
                'level' => $request->level,
                'nis' => $request->nis,
                'token' => null,
            ]);
            return redirect()->route('User.index');
        }
        if ($request->generatetoken == !null) {
            $token = Str::random(6);
            $user->update([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'status' => 0,
                'kelas' => $request->kelas,
                'level' => $request->level,
                'token' => $token,
            ]);
            return redirect()->route('User.index');
        } else {
            $user->update([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'status' => $request->status,
                'kelas' => $request->kelas,
                'level' => $request->level,
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
        $user = tokenuser::findOrFail($id);
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
    public function print($token_id)
    {
        $check = DB::table('token_siswa')->where('token_id', '=', $token_id)->where('token', '=', null)->count();
        // dd($check);
        if ($check == 0) {
            $user = tokenuser::findOrFail($token_id);
            //   dd($user);
            return view('admin.user.userprint', compact('user'));
        } else {
            alert()->error('Token', 'Token Kosong');
            return redirect()->route('User.index');
        }
    }
    public function printall()
    {
        $check = DB::table('token_siswa')->where('token', '=', null)->count();
        if ($check == 0) {
            $users = DB::table('token_siswa')->get();
            return view('admin.user.printall', compact('users'));
        } else {
            alert()->error('Token', 'Ada Token Yang Kosong');
            return redirect()->route('User.index');
        }
    }
     public function printlaporan()
    {   
            $users = DB::table('token_siswa')->where('status','=','0')->get();
            // dd($users);
            return view('admin.laporan.printdatagolput', compact('users'));
    }

}
