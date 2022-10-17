<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class paslonController extends Controller
{
   
    public function index(Request $request)
    {
        $paslons = Paslon::all();
        return view('admin.paslon.index', compact('paslons'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paslon.create');
    }

    /**
     * @param \App\Http\Requests\paslonStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'calon_ketua' => 'required|string',
            'calon_wakil' => 'required',
            'foto_calon' => 'required',
            'paslon_id' => 'required'
        ]);
          // dd($request->foto_calon);
        $paslon = paslon::create([
            'calon_ketua' => $request->calon_ketua,
            'paslon_id' => $request->paslon_id,
            'calon_wakil' => $request->calon_wakil,
            'foto_calon' => $request->file('foto_calon')->store('fotocalon')
        ]);

        return redirect()->route('paslon.index');
    }

    public function update(Request $request,$paslon_id)
    {
         $this->validate($request, [
            'calon_ketua' => 'required|string',
            'calon_wakil' => 'required',
        ]);

        $data = paslon::findOrFail($paslon_id);

         if($request->file('foto_calon') == "") {
    
            $data->update([
                'calon_ketua' => $request->calon_ketua,
                'calon_wakil' => $request->calon_wakil,
            ]);
    
        } else {
    
            Storage::disk('local')->delete('public/storage/'.$data->foto_calon);
    
            $data->update([
                 'calon_ketua' => $request->calon_ketua,
                 'calon_wakil' => $request->calon_wakil,
                 'foto_calon' => $request->file('foto_calon')->store('fotocalon')
            ]);
    
        }

        return redirect()->route('paslon.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\paslon $paslon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paslons = paslon::findOrFail($id);
        return view('admin.paslon.edit', compact('paslons'));
    }
    public function destroy($paslon_id)
    {
        $paslon = paslon::FindOrFail($paslon_id);
        Storage::disk('local')->delete('public/storage/'.$paslon->foto_calon);
        $paslon->delete();
        return redirect()->route('paslon.index');

    }
}
