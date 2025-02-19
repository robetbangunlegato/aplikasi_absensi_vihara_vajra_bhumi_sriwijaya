<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='role'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Role"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="row mb-4 gap-4">
                        <div class="col-12">
                            <div class="input-group input-group-outline {{ old('roleName') ? 'is-filled' : '' }}">
                                <label class="form-label" for="roleName">Nama Role/Peran</label>
                                <input type="text" class="form-control @error('roleName') is-invalid @enderror"
                                    id="roleName" name="roleName" value="{{ old('roleName') }}" required>
                            </div>
                            @error('roleName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 input-group input-group-static">
                            <label for="guardName">Nama guard</label>
                            <select class="form-control" name="guardName" id="guardName" required
                                @error('guardName') is-invalid @enderror>
                                <option value="">Pilih nama guard</option>
                                <option @if (old('guardName') === 'web') selected @endif value="web">WEB</option>
                                <option @if (old('guardName') === 'api') selected @endif value="api">API</option>
                            </select>
                            @error('guardName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
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
