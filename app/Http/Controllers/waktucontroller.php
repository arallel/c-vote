<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\waktupilih;
use RealRashid\SweetAlert\Facades\Alert;

class waktucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waktus = waktupilih::all();
        return view('admin.waktu.waktuindex',compact('waktus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exsist = waktupilih::count();
        // dd($exsist);
        if ($exsist == 1) {
             Alert::error('Error', 'Waktu Acara Maksimal 1 Waktu Apabila Mengalami Eror Ini Hapus Waktu Sebelumnya Agar Dapat Menambahkan Waktu baru ');
             return redirect()->route('waktu.index');
        }else{            
        return view('admin.waktu.waktucreate');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $exsist = waktupilih::count();
        if($exsist == 0){
            $this->validate($request, [
            'tanggal_pemilu' => 'required',
            'tanggal_selesai_pemilu' => 'required',
        ]);
         $data = waktupilih::create([
         'tanggal_pemilu' => $request->tanggal_pemilu,
         'tanggal_selesai_pemilu' => $request->tanggal_selesai_pemilu,
         ]);
         return redirect()->route('waktu.index');
        }else{
            return redirect()->route('waktu.index');
        }
         
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_waktu)
    {
        $waktu = waktupilih::findOrFail($id_waktu);
        return view('admin.waktu.waktuedit',compact('waktu'));
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
        
        $this->validate($request, [
            'tanggal_pemilu' => 'required',
            'tanggal_selesai_pemilu' => 'required',
        ]);
         
        $data = waktupilih::findOrFail($id);
         $data->update([
         'tanggal_pemilu' => $request->tanggal_pemilu,
         'tanggal_selesai_pemilu' => $request->tanggal_selesai_pemilu,
         ]);
          return redirect()->route('waktu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $waktu = waktupilih::findOrFail($id);
        $waktu->delete();
          return redirect()->route('waktu.index');
    }
}
