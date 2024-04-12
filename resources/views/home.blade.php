@extends('layouts.app')

@section('content')

@if (Auth::user()->role == 'keuangan')
    @livewire('riwayatpemasukan')
    @livewire('hitung')
@endif

@if (Auth::user()->role == 'Pembelian')
    @livewire('pembelianitem')
@endif

@if (Auth::user()->role == 'Admin')
    @livewire('hitung')
    @livewire('regiskan')
    @livewire('riwayatpemasukan')
@endif

@endsection
