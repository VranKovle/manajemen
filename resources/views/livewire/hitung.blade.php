<div>
    {{-- Stop trying to control. --}}

    <div class="card mx-auto" style="width: 80%">
        <div class="card-header">
            <p class="text-center fs-3">Total & perhitungan uang</p>
        </div>
        <div class="card-body" wire:poll>
            <p>Pendapatan total saat ini : Rp. <span wire:model="totalUangMasuk">{{ $totalUangMasuk }}</span></p>
            <p>Pengeluaran total saat ini : Rp. <span wire:model="totalUangKeluar">{{ $totalUangKeluar }}</span></p>
            <p>Pendapatan bersih saat ini : Rp. <span wire:model="totalbersih">{{ $totalbersih }}</span></p>
        </div>
    </div>


</div>
