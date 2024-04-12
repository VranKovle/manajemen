@extends('layouts.forhome')

@section('content')
    <div class="card mx-auto" style="width: 80%">
        <div class="card-body">
            @if (Route::has('login'))
                @auth

                    @if (Auth::user()->role == 'keuangan')
                        <a href="{{ url('/home') }}" class="btn btn-primary">
                            Your Work (Manajemen keuangan)
                        </a>
                    @endif

                    @if (Auth::user()->role == 'Pembelian')
                        <a href="{{ url('/home') }}" class="btn btn-primary">
                            Your Work (Manajemen Pembelian)
                        </a>
                    @endif

                    @if (Auth::user()->role == 'Admin')
                    <a href="{{ url('/home') }}" class="btn btn-primary">
                        Your Work (Admin view)
                    </a>
                    @endif

                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-dark">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
@endsection
