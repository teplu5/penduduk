<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layout.app')
    @section('content')
    <h1>Detail Data Penduduk</h1>
    <div class="container">
    <a href="{{ route('penduduk.index') }}"><- Kembali</a>
    <p><strong>NIK:</strong> {{ $penduduk->nik }}</p>
    <p><strong>No KK:</strong> {{ $penduduk->no_kk }}</p>
    <p><strong>Nama Lengkap:</strong> {{ $penduduk->nama_lengkap }}</p>
    <p><strong>Tempat Lahir:</strong> {{ $penduduk->tempat_lahir }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $penduduk->tanggal_lahir }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $penduduk->jenis_kelamin }}</p>
    <p><strong>Agama:</strong> {{ $penduduk->agama }}</p>
    <p><strong>Pekerjaan:</strong> {{ $penduduk->pekerjaan }}</p>
    <p><strong>Pendidikan:</strong> {{ $penduduk->pendidikan }}</p>
    <p><strong>Alamat Jalan:</strong> {{ $penduduk->alamat_jalan }}</p>
    <p><strong>RT:</strong> {{ $penduduk->alamat_rt }}</p>
    <p><strong>RW:</strong> {{ $penduduk->alamat_rw }}</p>
    <p><strong>Desa/Kelurahan:</strong> <span id="txt_desa">{{ $penduduk->alamat_desa }}</span></p>
    <p><strong>Kecamatan:</strong> <span id="txt_kecamatan">{{ $penduduk->alamat_kecamatan }}</span></p>
    <p><strong>Kabupaten:</strong> <span id="txt_kabupaten">{{ $penduduk->alamat_kabupaten }}</span></p>
    <p><strong>Provinsi:</strong> <span id="txt_provinsi">{{ $penduduk->alamat_provinsi }}</span></p>
    <p><strong>Kodepos:</strong> {{ $penduduk->kodepos }}</p>
    </div>
    @endsection

    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Ambil ID angka yang saat ini tertulis di halaman web
    const idProvinsi = "{{ $penduduk->alamat_provinsi }}".trim();
    const idKabupaten = "{{ $penduduk->alamat_kabupaten }}".trim();
    const idKecamatan = "{{ $penduduk->alamat_kecamatan }}".trim();
    const idDesa = "{{ $penduduk->alamat_desa }}".trim();

    // 1. Terjemahkan ID Provinsi
    if (idProvinsi) {
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/v2/stats.json`)
        .then(res => res.json())
        .then(result => {
            // Langsung menggunakan 'result.find' tanpa tambahan '.data'
            const data = result.find(item => item.id == idProvinsi);
            if (data) document.getElementById('txt_provinsi').innerText = data.name;
        }).catch(err => console.error('Gagal memuat provinsi:', err));
    }

    if (idProvinsi && idKabupaten) {
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/v2/regencies/${idProvinsi}.json`)
        .then(res => res.json())
        .then(result => {
            const data = result.data.find(item => item.id == idKabupaten);
            if (data) document.getElementById('txt_kabupaten').innerText = data.name;
        }).catch(err => console.error('Gagal memuat kabupaten:', err));
    }

    // 3. Terjemahkan ID Kecamatan
    if (idKabupaten && idKecamatan) {
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/v2/districts/${idKabupaten}.json`)
        .then(res => res.json())
        .then(result => {
            const data = result.data.find(item => item.id == idKecamatan);
            if (data) document.getElementById('txt_kecamatan').innerText = data.name;
        }).catch(err => console.error('Gagal memuat kecamatan:', err));
    }

    // 4. Terjemahkan ID Desa
    if (idKecamatan && idDesa) {
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/v2/villages/${idKecamatan}.json`)
        .then(res => res.json())
        .then(result => {
            const data = result.data.find(item => item.id == idDesa);
            if (data) {
                // Ganti teks angka di dalam span menjadi Nama Desa asli
                document.getElementById('txt_desa').innerText = data.name;
            }
        })
        .catch(err => console.error('Gagal memuat data desa percobaan:', err));
    }
});
</script>

</body>
</html>