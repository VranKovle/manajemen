<?php

namespace App\Livewire;

use App\Models\jumlahuang;
use App\Models\uangberkurang;
use Livewire\Component;

class Hitung extends Component
{
    public $pendapatanBersih;
    public $jumlahuang;
    public $uangberkurang;
    public $totalUangMasuk;
    public $totalbersih;
    public $totalUangKeluar;

    public function mount()
    {
        $this->jumlahuang = JumlahUang::all();
        $this->uangberkurang = UangBerkurang::all();

        $this->calculateTotalUangMasuk();
        $this->calculateTotalUangKeluar();
        $this->calculateTotalbersih();
    }

    public function calculateTotalUangMasuk()
    {
        $this->jumlahuang = JumlahUang::all();
        $this->totalUangMasuk = $this->jumlahuang->sum('uangmasuk');
    }

    public function calculateTotalUangKeluar()
    {
        $this->uangberkurang = UangBerkurang::all();
        $this->totalUangKeluar = $this->uangberkurang->sum('pengeluaran');
    }

    public function calculateTotalbersih()
    {
        $this->totalbersih = $this->totalUangMasuk - $this->totalUangKeluar;
    }

    public function render()
    {
        return view('livewire.hitung', [
            'jumlahuang' => $this->jumlahuang,
            'uangberkurang' => $this->uangberkurang,
            'totalUangMasuk' => $this->totalUangMasuk,
            'totalUangKeluar' => $this->totalUangKeluar,
            'totalbersih' => $this->totalbersih,
        ]);
    }
}
