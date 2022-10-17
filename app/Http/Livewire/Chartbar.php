<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\vote;
use App\Models\paslon;
use DB;
use Illuminate\Database\Eloquent\Builder;

class Chartbar extends Component
{
    public $paslon1count;
    public $paslon2count;
    public $paslon3count;
    public $paslon1name;
    public $paslon2name;
    public $paslon3name;
    public function mount()
    {
        $paslon1count = DB::table('vote')
                 ->where('id_paslon', '=', 1)
                ->count();
        $paslon2count = DB::table('vote')
                 ->where('id_paslon', '=', 2)
                ->count();
        $paslon3count = DB::table('vote')
                 ->where('id_paslon', '=', 3)
                ->count();
        $this->paslon1count = json_encode($paslon1count);
        $this->paslon2count = json_encode($paslon2count);
        $this->paslon3count = json_encode($paslon3count);
        //name paslon
        $paslon1name = paslon::where('paslon_id',1)->select('calon_ketua')->get();
        $paslon2name =paslon::where('paslon_id',2)->select('calon_ketua')->get();
        $paslon3name =paslon::where('paslon_id',3)->select('calon_ketua')->get();
                 foreach ($paslon1name as $paslon1)
                foreach ($paslon2name as $paslon2)
                foreach ($paslon3name as $paslon3)
        $this->paslon1name = json_encode($paslon1->calon_ketua);
        $this->paslon2name = json_encode($paslon2->calon_ketua);
        $this->paslon3name = json_encode($paslon3->calon_ketua);
      
        // $test = json_decode($paslon1name);
        // dd($this->paslon1name);
        
    }
    public function render()
    {
        return view('livewire.chartbar');
    }
}
