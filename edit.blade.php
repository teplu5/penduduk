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


    <h1>Edit Data Penduduk</h1>
    <div class="container">
    <a href="{{ route('penduduk.index') }}"><- Kembali</a>
    <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nik">NIK :</label>
            <input type="text" name="nik" id="nik" value="{{ $penduduk->nik }}" required>
        </div>
        <div>
            <label for="no_kk">No KK :</label>
            <input type="text" name="no_kk" id="no_kk" value="{{ $penduduk->no_kk }}" required>
        </div>
        <div>
            <label for="nama_lengkap">Nama Lengkap :</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $penduduk->nama_lengkap }}" required>
        </div>
        <div>
            <label for="tempat_lahir">Tempat Lahir :</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" required>
        </div>
        <div>
            <label for="tanggal_lahir">Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}" required>
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin :</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" {{ $penduduk->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $penduduk->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div>
            <label for="agama">Agama :</label>
            <select name="agama" id="agama" required>
                <option value="">-- Pilih Agama --</option>
                @foreach(['islam', 'katolik', 'kristen', 'hindu', 'budha', 'konghucu'] as $agama)
                    <option value="{{ $agama }}" {{ $penduduk->agama == $agama ? 'selected' : '' }}>{{ ucfirst($agama) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="pekerjaan">Pekerjaan :</label>
            <select name="pekerjaan" id="pekerjaan" required>
                <option value="">-- Pilih Pekerjaan --</option>
                @foreach(['petani', 'pekerja_swasta', 'peternak', 'kuli', 'wirausaha', 'perangkat_desa', 'pns', 'nakes'] as $pekerjaan)
                    <option value="{{ $pekerjaan }}" {{ $penduduk->pekerjaan == $pekerjaan ? 'selected' : '' }}>{{ ucfirst($pekerjaan) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="pendidikan">Pendidikan :</label>
            <select name="pendidikan" id="pendidikan" required>
                <option value="">-- Pilih Pendidikan --</option>
                @foreach(['tidak sekolah', 'tk', 'sd', 'smp', 'sma', 'd1', 'd2', 'd3', 's1', 's2', 's3'] as $pendidikan)
                    <option value="{{ $pendidikan }}" {{ $penduduk->pendidikan == $pendidikan ? 'selected' : '' }}>{{ strtoupper($pendidikan) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="alamat_jalan">Alamat Jalan :</label>
            <input type="text" name="alamat_jalan" id="alamat_jalan" value="{{ $penduduk->alamat_jalan }}" required>
        </div>
        <div>
            <label for="alamat_rt">RT :</label>
            <input type="text" name="alamat_rt" id="alamat_rt" value="{{ $penduduk->alamat_rt }}" required>
        </div>
        <div>
            <label for="alamat_rw">RW :</label>
            <input type="text" name="alamat_rw" id="alamat_rw" value="{{ $penduduk->alamat_rw }}" required>
        </div>
        <div>
            <label for="alamat_desa">Alamat Desa :</label>
            <input type="text" name="alamat_desa" id="alamat_desa" value="{{ $penduduk->alamat_desa }}" required>
        </div>
        <div>
            <label for="alamat_kecamatan">Alamat Kecamatan :</label>
            <input type="text" name="alamat_kecamatan" id="alamat_kecamatan" value="{{ $penduduk->alamat_kecamatan }}" required>
        </div>
        <div>
            <label for="alamat_kabupaten">Alamat Kabupaten :</label>
            <input type="text" name="alamat_kabupaten" id="alamat_kabupaten" value="{{ $penduduk->alamat_kabupaten }}" required>
        </div>
        <div>
            <label for="alamat_provinsi">Alamat Provinsi :</label>
            <input type="text" name="alamat_provinsi" id="alamat_provinsi" value="{{ $penduduk->alamat_provinsi }}" required>
        </div>
        <div>
            <label for="kodepos">Kodepos :</label>
            <input type="text" name="kodepos" id="kodepos" value="{{ $penduduk->kodepos }}" required>
        </div>
        <br>
        <button type="submit">Update</button>
    </form>
    </div>
    @endsection
</body>
</html>