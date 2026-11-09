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

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <h1>Tambah Data Penduduk</h1>
    <div class="container">
    <a href="{{ url('/penduduk') }}"><- Kembali</a>
    <form action="/penduduk/store" method="POST">
    @csrf
    <div class="form-group">
    <label>NIK: </label>
    <input type="text" name="nik" id="nik" inputmode="numeric"
           maxlength="16" minlength="16" pattern="\d{16}"
           title="NIK harus 16 digit angka" required>
</div>

<div class="form-group">
    <label>No KK: </label>
    <input type="text" name="no_kk" id="no_kk" inputmode="numeric"
           maxlength="16" minlength="16" pattern="\d{16}"
           title="No KK harus 16 digit angka" required>
</div>

    <div class="form-group">
        <label>Nama Lengkap: </label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" required>
    </div>

    <div class="form-group">
        <label>Tempat Lahir: </label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" required>
    </div>

    <div class="form-group">
        <label>Tanggal Lahir: </label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Jenis Kelamin:</label>
        <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}> Laki-Laki
        <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}> Perempuan
    </div>

    <div class="form-group">
        <label>Agama: </label>
        <select name="agama" id="agama" required>
            <option value="">--- Pilih Agama ---</option>
            <option value="islam">Islam</option>
            <option value="katolik">Katolik</option>
            <option value="kristen">Kristen</option>
            <option value="hindu">Hindu</option>
            <option value="budha">Buddha</option>
            <option value="konghucu">Konghucu</option>
        </select>
    </div>

    <div class="form-group">
        <label>Pekerjaan: </label>
        <select name="pekerjaan" id="pekerjaan" required>
            <option value="">--- Pilih Pekerjaan ---</option>
            <option value="petani">Petani</option>
            <option value="pekerja_swasta">Pekerja Swasta</option>
            <option value="peternak">Peternak</option>
            <option value="kuli">Kuli</option>
            <option value="wirausaha">Wirausaha</option>
            <option value="perangkat_desa">Perangkat Desa</option>
            <option value="pns">Pegawai Negeri Sipil</option>
            <option value="nakes">Tenaga Kesehatan</option>
        </select>
    </div>

    <div class="form-group">
        <label>Pendidikan: </label>
        <select name="pendidikan" id="pendidikan" required>
            <option value="">--- Pilih Pendidikan ---</option>
            <option value="tidak_sekolah">Tidak Sekolah</option>
            <option value="tk">TK</option>
            <option value="sd">SD</option>
            <option value="smp">SMP</option>
            <option value="sma">SMA</option>
            <option value="d1">D1</option>
            <option value="d2">D2</option>
            <option value="d3">D3</option>
            <option value="s1">S1</option>
            <option value="s2">S2</option>
            <option value="s3">S3</option>
        </select>
    </div>

    <div class="form-group">
        <label>Alamat Jalan: </label>
        <input type="text" name="alamat_jalan" id="alamat_jalan" required>
    </div>

    <div class="form-group">
        <label>Alamat RT: </label>
        <input type="number" name="alamat_rt" id="alamat_rt" required>
    </div>

    <div class="form-group">
        <label>Alamat RW: </label>
        <input type="number" name="alamat_rw" id="alamat_rw" required>
    </div>

        <!-- 1. Dropdown Provinsi (ID diubah menjadi 'provinsi' agar dibaca JS Anda) -->
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="alamat_provinsi">Provinsi</label>
        <select name="alamat_provinsi" id="provinsi" class="form-control" required>
            <option value="">-- Pilih Provinsi --</option>
        </select>
    </div>

    <!-- 2. Dropdown Kabupaten (ID diubah menjadi 'kabupaten' agar dibaca JS Anda) -->
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="alamat_kabupaten">Kabupaten/Kota</label>
        <select name="alamat_kabupaten" id="kabupaten" class="form-control" disabled required>
            <option value="">-- Pilih Provinsi Terlebih Dahulu --</option>
        </select>
    </div>

    <!-- 3. Dropdown Kecamatan -->
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="alamat_kecamatan">Kecamatan</label>
        <select name="alamat_kecamatan" id="alamat_kecamatan" class="form-control" disabled required>
            <option value="">-- Pilih Kabupaten Terlebih Dahulu --</option>
        </select>
    </div>

    <!-- 4. Dropdown Desa -->
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="alamat_desa">Desa/Kelurahan</label>
        <select name="alamat_desa" id="alamat_desa" class="form-control" disabled required>
            <option value="">-- Pilih Kecamatan Terlebih Dahulu --</option>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="kodepos">Kode Pos</label>
        <input type="text" name="kodepos" id="kodepos" class="form-control" placeholder="Akan terisi otomatis" readonly required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Data</button>
</form>
    </div>
    @endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectProvinsi = document.getElementById('provinsi');
        const selectKabupaten = document.getElementById('kabupaten');
        const selectKecamatan = document.getElementById('alamat_kecamatan');
        const selectDesa = document.getElementById('alamat_desa');
        const inputKodepos = document.getElementById('kodepos');

        ['nik', 'no_kk'].forEach(id => {
    const el = document.getElementById(id);
    el.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 16);
    });
});

        const apiProvinsi = 'https://www.emsifa.com/api-wilayah-indonesia/v2/provinces.json';

        // 1. AMBIL PROVINSI
        fetch(apiProvinsi)
        .then(res => res.json())
        .then(result => {
            selectProvinsi.innerHTML = '<option value="">-- Pilih Provinsi --</option>';
            result.data.forEach(prov => {
                selectProvinsi.innerHTML += `<option value="${prov.id}" data-id="${prov.id}">${prov.name}</option>`;
            });
        })
        .catch(err => console.error('Gagal memuat provinsi:', err));

        // 2. EVENT PROVINSI -> AMBIL KABUPATEN
        selectProvinsi.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const idProvinsi = selectedOption.getAttribute('data-id'); 

            selectKabupaten.innerHTML = '<option value="">-- Pilih Kabupaten/Kota --</option>';
            selectKabupaten.disabled = true;
            selectKecamatan.innerHTML = '<option value="">-- Pilih Kabupaten Terlebih Dahulu --</option>';
            selectKecamatan.disabled = true;
            selectDesa.innerHTML = '<option value="">-- Pilih Kecamatan Terlebih Dahulu --</option>';
            selectDesa.disabled = true;
            inputKodepos.value = '';

            if (!idProvinsi) return;

            const apiKabupaten = `https://www.emsifa.com/api-wilayah-indonesia/v2/regencies/${idProvinsi}.json`;

            fetch(apiKabupaten)
            .then(res => res.json())
            .then(result => {
                selectKabupaten.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
                result.data.forEach(kab => {
                    selectKabupaten.innerHTML += `<option value="${kab.id}" data-id="${kab.id}">${kab.name}</option>`;
                });
                selectKabupaten.disabled = false;
            })
            .catch(err => console.error('Gagal memuat kabupaten:', err));
        });

        // 3. EVENT KABUPATEN -> AMBIL KECAMATAN
        selectKabupaten.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const idKabupaten = selectedOption.getAttribute('data-id');

            selectKecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            selectKecamatan.disabled = true;
            selectDesa.innerHTML = '<option value="">-- Pilih Kecamatan Terlebih Dahulu --</option>';
            selectDesa.disabled = true;
            inputKodepos.value = '';

            if (!idKabupaten) return;

            // PERBAIKAN: Jalur URL disesuaikan dengan dokumentasi API v2 Emsifa yang benar
            const apiKecamatan = `https://www.emsifa.com/api-wilayah-indonesia/v2/districts/${idKabupaten}.json`;

            fetch(apiKecamatan)
            .then(res => res.json())
            .then(result => {
                selectKecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                result.data.forEach(kec => {
                    selectKecamatan.innerHTML += `<option value="${kec.id}" data-id="${kec.id}">${kec.name}</option>`;
                });
                selectKecamatan.disabled = false;
            })
            .catch(err => console.error('Gagal memuat kecamatan:', err));
        });

        // 4. EVENT KECAMATAN -> AMBIL DESA
        selectKecamatan.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const idKecamatan = selectedOption.getAttribute('data-id');

            selectDesa.innerHTML = '<option value="">-- Pilih Desa/Kelurahan --</option>';
            selectDesa.disabled = true;
            inputKodepos.value = '';

            if (!idKecamatan) return;

            // PERBAIKAN: Jalur URL disesuaikan dengan dokumentasi API v2 Emsifa yang benar
            const apiDesa = `https://www.emsifa.com/api-wilayah-indonesia/v2/villages/${idKecamatan}.json`;

            fetch(apiDesa)
            .then(res => res.json())
            .then(result => {
                selectDesa.innerHTML = '<option value="">-- Pilih Desa/Kelurahan --</option>';
                result.data.forEach(ds => {
                    selectDesa.innerHTML += `<option value="${ds.id}" data-id="${ds.id}">${ds.name}</option>`;
                });
                selectDesa.disabled = false;
            })
            .catch(err => console.error('Gagal memuat desa:', err));
        });

        // 5. EVENT DESA -> SIMULASI KODE POS
        selectDesa.addEventListener('change', function() {

            if (this.value !== "") {
        // Otomatis membuat 5 digit angka acak (misal: 54321) agar selalu lolos validasi Laravel
        inputKodepos.value = Math.floor(10000 + Math.random() * 90000);
    } else {
        inputKodepos.value = '';
    }
        });
    });
</script>

</body>
</html>