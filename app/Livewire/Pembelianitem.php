<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\itempembelian;
use App\Models\uangberkurang;
use Illuminate\Support\Facades\Storage;

class Pembelianitem extends Component
{
    use WithFileUploads;
    public $namabarang;
    public $harga;
    public $gambarbukti;
    public $namabarangsearch;
    public $itemsPembelian;

    protected $rules = [
        'namabarang' => 'required|string',
        'harga' => 'required|numeric',
        'gambarbukti' => 'required|image|max:1024',
    ];

    public function simpan()
    {
        $this->validate();

        $gambarPath = $this->gambarbukti->store('public/gambarbukti');
        $gambarUrl = Storage::url($gambarPath);

        itempembelian::create([
            'namabarang' => $this->namabarang,
            'harga' => $this->harga,
            'gambarbukti' => $gambarUrl,
        ]);
        uangberkurang::create([
            'pengeluaran' => $this->harga,
        ]);

        $this->reset();

        session()->flash('message', 'Data berhasil disimpan.');

        $this->render();
    }

    public function hapusItem($itemId)
    {
        $item = itempembelian::findOrFail($itemId);

        if ($item->gambarbukti) {
            Storage::delete(parse_url($item->gambarbukti)['path']);
        }

        $item->delete();

        session()->flash('message', 'Item berhasil dihapus.');

        $this->render();
    }

    public function render()
    {
        $itemsPembelian = itempembelian::all();

        return view('livewire.pembelianitem', [
            'itemsPembelian' => $itemsPembelian,
        ]);
    }

    public function mount()
    {
        $this->itemsPembelian = [];
    }

    public function search()
    {
        $this->validate([
            'namabarangsearch' => 'required|string',
        ]);

        $this->itemsPembelian = ItemPembelian::where('namabarang', 'like', '%' . $this->namabarangsearch . '%')->get();
    }
    public function resetSearch()
    {
        $this->namabarangsearch = '';
        $this->itemsPembelian = false;
    }
}
