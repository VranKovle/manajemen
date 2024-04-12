<div>
    {{-- Be like water. --}}

    <div class="card p-1 mx-auto" style="width: 80%;">
        <div class="card-header">
            <p class="fw-bold text-center fs-3">Pengisian Pemasukkan & pengeluaran</p>
        </div>
        <div class="card-body">
            <p>Isi Data pemasukan :</p>
            <label for="">Masuk :</label>
            <input type="number" class="p-1 w-32" wire:model="pemasukkan">
            <button class="btn btn-dark"
                wire:click="simpan">Isi</button>

            <p>Isi Data pengeluaran :</p>
            <label for="">Keluar :</label>
            <input type="number" class="p-1 w-32" wire:model="pengeluaran">
            <button class="btn btn-dark"
                wire:click="simpanpengeluaran">Isi</button>
        </div>
            <div class="card-header">
                <p class="fs-4 fw-bold text-center">Riwayat uang masuk</p>
            </div>
            <div class="p-2">
                @if ($munculhilangpemasukan)
                <button class="btn btn-dark btn-sm" wire:click="showpemasukan">Show</button>
                @endif
                @if ($munculkanpemasukan)
                <button class="btn btn-dark btn-sm" wire:click="hidepemasukan">Hide</button>
                @foreach ($jumlahuang as $data)
                    <div>
                        <p>Tanggal : {{ Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y , HH:mm') }}
                        </p>
                        <p>Rp {{ $data->uangmasuk }}</p>
                    </div>
                @endforeach
                @endif
            </div>
                <div class="card-header">
                    <p class="fs-4 fw-bold text-center">Riwayat uang Keluar</p>
                </div>
                <div class="p-2">
                    @if ($munculhilangpengeluaran)
                    <button class="btn btn-dark btn-sm" wire:click="showpengeluaran">Show</button>
                    @endif
                    @if ($munculkanpengeluaran)
                    <button class="btn btn-dark btn-sm" wire:click="hidepengeluaran">Hide</button>
                     @foreach ($uangberkurang as $data)
                        <div>
                            <p>Tanggal :
                                {{ Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y , HH:mm') }}
                            </p>
                            <p>Rp {{ $data->pengeluaran }}</p>
                        </div>
                    @endforeach
                    @endif

                </div>
            </div>

        <div class="card mx-auto" style="width: 80%">
            <div class="card-header">
                <p class="text-center fs-3">Lihat Pengeluaran sebagai Barang Yang Dibeli</p>
            </div>
            <div class="card-body">
                @if ($munculhilangbarang)
                <button class="btn btn-dark btn-sm" wire:click="showbarang">Show</button>
                @endif
                @if ($munculkanbarang)
                <button class="btn btn-dark btn-sm" wire:click="hidebarang">Hide</button>
                @foreach (App\Models\Itempembelian::all() as $item)
                <li class="list-group-item">
                    <p><span class="fw-bold">Nama barang :</span> {{ $item->namabarang }} , Harga : {{ $item->harga }}</p>
                    @if ($item->gambarbukti)
                        <img src="{{ $item->gambarbukti }}" alt="Gambar Bukti" class="img-thumbnail w-50">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif

                </li>
            @endforeach
            @endif
            </div>
        </div>


    </div>
