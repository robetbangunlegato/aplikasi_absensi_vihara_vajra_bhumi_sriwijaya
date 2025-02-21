<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='kelolapengguna'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Kelola Pengguna"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('kelolapengguna.store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="nama" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" min="0" required>
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- <select name="jabatan_organisasi_id" id="jabatan_organisasi_id"
                                class="form-select px-3 @error('jabatan_organisasi_id') is-invalid @enderror" required>
                                <option value="">Pilih Jabatan Organisasi</option>
                                @foreach ($jabatan_organisasis as $jabatan_organisasi)
                                    <option value="{{ $jabatan_organisasi->id }}"
                                        {{ old('jabatan_organisasi_id') == $jabatan_organisasi->id ? 'selected' : '' }}>
                                        {{ $jabatan_organisasi->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select> --}}
                        <div class="input-group input-group-static">
                            <label for="jabatan_organisasi_id" class="ms-0">Jabatan organisasi</label>
                            <select class="form-control @error('jabatan_organisasi_id') is-invalid @enderror"
                                name="jabatan_organisasi_id" id="jabatan_organisasi_id" required>

                                <!-- Tambahkan option kosong -->
                                <option value="" selected disabled>-- Pilih Jabatan --</option>

                                @foreach ($jabatan_organisasis as $jabatan_organisasi)
                                    <option value="{{ $jabatan_organisasi->id }}"
                                        {{ old('jabatan_organisasi_id') == $jabatan_organisasi->id ? 'selected' : '' }}>
                                        {{ $jabatan_organisasi->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>

                            @error('jabatan_organisasi_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="row my-4">
                        <div class="input-group input-group-static">
                            <label for="role" class="ms-0">Hak Akses Aplikasi</label>
                            <select name="role" id="role"
                                class="form-control px-3 @error('role') is-invalid @enderror" required>
                                <!-- Tambahkan option kosong -->
                                <option value="" selected disabled>-- Pilih hak akses aplikasi --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row my-4">
                        <div class="col-12">
                            <div class="input-group input-group-static">
                                <label for="tanggalLahir">Tanggal lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggalLahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            </div>
                            @error('tanggal_lahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="row my-4">
                        <div class="col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label" for="tempatLahir">Tempat lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="tempatLahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            </div>
                            @error('tempat_lahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="row my-4">
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
