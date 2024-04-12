<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class Regiskan extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    public $openregis = false;
    public $closeregis = true;

    public $alert = false;

    public function showregis(){
        $this->openregis = true;
        $this->closeregis = false;
    }
    public function hideregis(){
        $this->openregis = false;
        $this->closeregis = true;
    }

    public function simpan(){

        $simpan = new User();
        $simpan->name = $this->name;
        $simpan->email = $this->email;
        $simpan->password = bcrypt($this->password);
        $simpan->role = $this->role;
        $simpan->save();

        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';

        $this->alert = true;
    }
    public function hapus($id){
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function render()
    {
        return view('livewire.regiskan');
    }
}
