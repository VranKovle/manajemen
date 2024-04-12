<div>
    {{-- Stop trying to control. --}}
    <div class="card mx-auto" style="width: 80%">
        <div class="card-header"><h3 class="fw-bold text-center">Pembelian Item</h3></div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <form wire:submit.prevent="simpan">
                <div class="form-group">
                    <label for="namabarang">Nama Barang:</label>
                    <input type="text" class="form-control" id="namabarang" wire:model="namabarang">
                    @error('namabarang') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" class="form-control w-50" id="harga" wire:model="harga">
                    @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="gambarbukti">Gambar Bukti:</label> <br>
                    <input type="file" class="form-control-file mt-2" id="gambarbukti" wire:model="gambarbukti">
                    @error('gambarbukti') <span class="text-danger">{{ $message }}</span> @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <h3>Daftar Item Pembelian</h3>
            <ul class="list-group">

                <form wire:submit.prevent="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari nama barang..." wire:model="namabarangsearch">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Cari</button>
                        <button class="btn btn-dark" type="button" wire:click="resetSearch">Reset</button>
                    </div>
                </div>
                </form>

                @if (!empty($itemsPembelian) && count($itemsPembelian) > 0)
                <ul class="list-group">
                    @foreach ($itemsPembelian as $item)
                        <li class="list-group-item">
                            <p><span class="fw-bold">Nama barang :</span> {{ $item->namabarang }} , Harga : {{ $item->harga }}</p>
                            @if ($item->gambarbukti)
                                <img src="{{ $item->gambarbukti }}" alt="Gambar Bukti" class="img-thumbnail w-50">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

                @foreach (App\Models\Itempembelian::all() as $item)
                <li class="list-group-item">
                    <p><span class="fw-bold">Nama barang :</span> {{ $item->namabarang }} , Harga : Rp.{{ $item->harga }}</p>
                    @if ($item->gambarbukti)
                        <img src="{{ $item->gambarbukti }}" alt="Gambar Bukti" class="img-thumbnail w-50">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif

                </li>
            @endforeach

            </ul>
        </div>
    </div>

</div>
