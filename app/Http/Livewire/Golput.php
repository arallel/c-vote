<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\User;
use App\Models\vote;


class Golput extends Component
{
    public $user;
    public $vote;
    public $data;
    public function mount()
    {

        $user = DB::table('token_siswa')->get()->count();
                // dd($user);
        $vote = vote::count('vote_count');
        $data = $user - $vote;
        $this->data = json_encode($data);
        $this->vote = json_encode($vote);
    }
    public function render()
    {
        return view('livewire.golput');
    }
}
