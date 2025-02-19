<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='role'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Role"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            @if (session('sukses'))
                <div class="row">
                    <div class="alert alert-success text-white" role="alert" id="pesan_sukses">
                        <strong>Berhasil!</strong> {{ session('sukses') }}
                    </div>
                </div>
            @endif
            <div class="row">
                <a href="{{ route('role.create') }}" class="btn btn-primary">Tambah role/peran
                    aplikasi</a>
            </div>
            <div class="row">
                <div class="col-12 p-0 mt-2">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="absensi-table">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                            Nama
                                        </th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                            Guard
                                        </th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                            Dibuat
                                        </th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                            Diperbaharui
                                        </th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                            Opsi
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="text-center" style="">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>{{ $role->created_at }}</td>
                                            <td>{{ $role->updated_at }}</td>

                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    @if ($role->name === 'super admin')
                                                    @else
                                                        <a href="{{ route('role.edit', $role->id) }}"
                                                            class="btn btn-warning mx-1">Edit</a>
                                                        <a href="#" class="btn btn-danger mx-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalHapus-{{ $role->id }}">Hapus</a>
                                                    @endif
                                                </div>
                                            </td>
                                            {{-- @endrole --}}

                                        </tr>
                                        <!-- Modal untuk setiap jabatan -->
                                        <div class="modal fade" id="modalHapus-{{ $role->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Role
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus role
                                                        "{{ $role->name }}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <form action="{{ route('role.destroy', $role->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- {{ $absensis->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#pesan_sukses").delay(3000).fadeOut("slow");

            $('.btn-hapus').on('click', function() {
                const id = $(this).data('id');
                $('#jabatan-id').text(id); // Isi placeholder dengan ID
            });
        });
    </script>
</x-layout>
