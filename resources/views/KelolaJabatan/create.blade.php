<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='kelolajabatan'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Absensi"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <form action="{{ route('kelolajabatan.store') }}" method="post">
                @csrf
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="input-group input-group-outline">
                            <label class="form-label"for="namaJabatan">Nama jabatan</label>
                            <input type="text" class="form-control" id="namaJabatan" name="nama_jabatan" required
                                autofocus>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <div class="input-group input-group-outline">
                            <label class="form-label"for="besaranGaji">Gaji</label>

                            <!-- input ini menampilkan gaji dengan titik-titik agar mudah dibaca -->
                            <input type="tel" class="form-control" id="besaranGajiDisplay" required>

                            <!-- input ini untuk dikirim ke backend -->
                            <input type="hidden" class="form-control" id="besaranGaji" name="besaran_gaji">
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            $(document).ready(function() {
                $('#besaranGajiDisplay').on('input', function() {
                    let angka = $(this).val().replace(/\D/g, "");
                    // menyamakan input antara diDisplay dengan yang akan dikirim ke backend
                    $('#besaranGaji').val(angka);
                    // membuat titik-titik agar mudah dibaca
                    $(this).val(new Intl.NumberFormat('id-ID').format(angka));
                })
            })
        </script>
    </main>
</x-layout>
