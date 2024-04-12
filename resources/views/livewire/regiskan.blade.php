<div>
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <div class="card mx-auto" style="width: 80%">
            <div class="card-header"><p class="fw-bold text-center fs-3">Registrasikan & Manajemen Akun</p></div>
            <div class="card-body">
                @if ($closeregis)
                <button class="btn btn-dark btn-sm mb-3" wire:click="showregis">Open Registrasi</button>
                @endif
                @if ($openregis)
                <button class="btn btn-dark btn-sm mb-3" wire:click="hideregis">Close Registrasi</button>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Register') }}</div>

                                <div class="card-body">

                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                                wire:model='name'>

                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" wire:model='email'>


                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password" wire:model='password'>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Konfirmasi
                                            Password</label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end">Peran</label>

                                        <div class="col-md-6" wire:model='role'>
                                            <select class=" form-control" style="padding: 5px;">
                                                <option selected disabled hidden>Pilih Jabatan</option>
                                                <option name="peran" value="keuangan">Keuangan</option>
                                                <option name="peran" value="Pembelian">Pembelian</option>
                                                <option name="peran" value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button class="btn btn-primary" wire:click='simpan'>SIMPAN</button>
                                        </div>
                                        @if ($alert)
                                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                            <strong>Akun Berhasil Dibuat</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> <!-- Tombol close -->
                                          </div>
                                        @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <br>
                {{-- Bagian --}}
<table class="table">
    <thead class="table-dark">
        <tr>
            <th>Nama Akun</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach (App\Models\User::all() as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td><button class="btn btn-danger btn-sm" wire:click="hapus({{ $user->id }})">Hapus</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
</div>
