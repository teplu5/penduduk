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
    <h1>Data Penduduk</h1>
    <div class="container">
    <a href="{{ route('penduduk.create') }}">Tambah Data Penduduk</a>
    <div class="table-wrapper">
    <table border="1" width="80%">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>No KK</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Pekerjaan</th>
                <th>Pendidikan</th>
                <th>Alamat Jalan</th>
                <th>Alamat RT</th>
                <th>Alamat RW</th>
                <th>Alamat Desa</th>
                <th>Alamat Kecamatan</th>
                <th>Alamat Kabupaten</th>
                <th>Alamat Provinsi</th>
                <th>Kodepos</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $item)
                <tr>
                    <td scope="row" style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->no_kk }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->alamat_jalan }}</td>
                    <td>{{ $item->alamat_rt }}</td>
                    <td>{{ $item->alamat_rw }}</td>
                    <td data-level="desa" data-kode="{{ $item->alamat_desa }}">{{ $item->alamat_desa }}</td>
                    <td data-level="kecamatan" data-kode="{{ $item->alamat_kecamatan }}">{{ $item->alamat_kecamatan }}</td>
                    <td data-level="kabupaten" data-kode="{{ $item->alamat_kabupaten }}">{{ $item->alamat_kabupaten }}</td>
                    <td data-level="provinsi" data-kode="{{ $item->alamat_provinsi }}">{{ $item->alamat_provinsi }}</td>
                    <td>{{ $item->kodepos }}</td>
                    <td>
                        <button type="submit"><a href="{{ route('penduduk.show', $item->id) }}">Lihat</a></button>
                        <button type="submit"><a href="{{ route('penduduk.edit', $item->id) }}">Edit</a></button>
                        <form action="{{ route('penduduk.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const base = 'https://www.emsifa.com/api-wilayah-indonesia/v2';
    const cache = {};

    function getList(url) {
        if (!cache[url]) {
            cache[url] = fetch(url).then(r => r.json()).then(r => r.data ?? r);
        }
        return cache[url];
    }

    function titleCase(s) {
        return s.toLowerCase().replace(/\b\w/g, c => c.toUpperCase());
    }

    document.querySelectorAll('td[data-kode]').forEach(td => {
        const kode = td.dataset.kode;            // contoh: 34.71.01.1004
        if (!/^\d+(\.\d+)*$/.test(kode)) return; // data lama berupa nama, biarkan
        const p = kode.split('.');

        let url;
        switch (td.dataset.level) {
            case 'provinsi':  url = `${base}/provinces.json`; break;
            case 'kabupaten': url = `${base}/regencies/${p[0]}.json`; break;
            case 'kecamatan': url = `${base}/districts/${p[0]}.${p[1]}.json`; break;
            case 'desa':      url = `${base}/villages/${p[0]}.${p[1]}.${p[2]}.json`; break;
            default: return;
        }

        getList(url)
            .then(list => {
                const found = list.find(x => String(x.id) === kode);
                if (found) td.textContent = titleCase(found.name);
            })
            .catch(err => console.error('Gagal memuat wilayah:', err));
    });
});
</script>
    @endsection
</body>
</html>