<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='kelolajabatan'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Absensi"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <form action="{{ route('kelolajabatan.update', $jabatan_organisasi->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="input-group input-group-outline is-filled">
                            <label class="form-label"for="namaJabatan">Nama jabatan</label>
                            <input type="text" class="form-control" id="namaJabatan" name="nama_jabatan"
                                value="{{ $jabatan_organisasi->nama_jabatan }}">
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <div class="input-group input-group-outline is-filled">
                            <label class="form-label"for="namaJabatan">Besaran Gaji</label>
                            <input type="text" class="form-control" id="besaranGajiDisplay"
                                value="{{ $jabatan_organisasi->besaran_gaji }}">
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
            // Ambil data dari Laravel
            const besaranGaji = @json($jabatan_organisasi->besaran_gaji);

            // Format angka ke Rupiah
            const formattedGaji = new Intl.NumberFormat("id-ID").format(besaranGaji);

            // Masukkan ke dalam input dengan ID 'besaranGajiDisplay'
            document.getElementById('besaranGajiDisplay').value = formattedGaji;

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
