<?php

namespace App\Livewire;

use App\Models\uangberkurang;
use App\Models\jumlahuang;
use Livewire\Component;

class Riwayatpemasukan extends Component
{
    public $pemasukkan;
    public $pengeluaran;

    public $munculkanpemasukan = false ;
    public $munculhilangpemasukan = true ;

    public $munculkanpengeluaran = false ;
    public $munculhilangpengeluaran = true ;

    public $munculkanbarang = false ;
    public $munculhilangbarang = true ;
// pemasukanshow
    public function showpemasukan(){
        $this->munculkanpemasukan = true;
        $this->munculhilangpemasukan = false;
    }
    public function hidepemasukan(){
        $this->munculkanpemasukan = false;
        $this->munculhilangpemasukan = true;
    }
// pengeluaranshow
    public function showpengeluaran(){
        $this->munculkanpengeluaran = true;
        $this->munculhilangpengeluaran = false;
    }
    public function hidepengeluaran(){
        $this->munculkanpengeluaran = false;
        $this->munculhilangpengeluaran = true;
    }
// barangshow
    public function showbarang(){
        $this->munculkanbarang = true;
        $this->munculhilangbarang = false;
    }
    public function hidebarang(){
        $this->munculkanbarang = false;
        $this->munculhilangbarang = true;
    }

    public function simpan(){
        $simpan = new jumlahuang();
        $simpan->uangmasuk = $this->pemasukkan;
        $simpan->save();
        $this->reset(['pemasukkan']);
    }
    public function simpanpengeluaran()
    {
        $simpan = new uangberkurang();
        $simpan->pengeluaran = $this->pengeluaran;
        $simpan->save();
        $this->reset(['pengeluaran']);
    }
    public function render()
    {
        $jumlahuang = jumlahuang::all();
        $uangberkurang = uangberkurang::all();
        return view('livewire.Riwayatpemasukan', compact('jumlahuang','uangberkurang'));
    }
}
