<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendudukControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $penduduk = PendudukModel::latest()->get();
    
    return view('penduduk.index', compact('penduduk'));
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    // Bersih tanpa DB karena data diambil langsung via API Emsifa di View (JS)
    return view('penduduk.create');
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // 1. Ambil semua input data
    $input = $request->all();

    // 2. Manipulasi string agar nama wilayah rapi (Huruf Kapital di Awal Kata / Capitalize Each Word)
    // Ini penting karena API Emsifa mengembalikan teks UPPERCASE (misal: "JAWA TENGAH" -> "Jawa Tengah")
    
    // 3. Otomatisasi Padding RT/RW jika user mengetik 1 atau 2 digit (misal: "1" otomatis jadi "001")
    if ($request->has('alamat_rt')) {
        $input['alamat_rt'] = str_pad($request->alamat_rt, 3, '0', STR_PAD_LEFT);
    }
    if ($request->has('alamat_rw')) {
        $input['alamat_rw'] = str_pad($request->alamat_rw, 3, '0', STR_PAD_LEFT);
    }

    // 4. Proses Validasi menggunakan data yang sudah dimanipulasi ($input)
    $validator = Validator::make($input, [
        'nik' => 'required|digits:16|unique:penduduk,nik', 
        'no_kk' => 'required|digits:16',                  
        'nama_lengkap' => 'required|string|max:50',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required|in:islam,katolik,kristen,hindu,budha,konghucu',
        'pekerjaan' => 'required|string|max:255',
        'pendidikan' => 'required|in:tidak sekolah,tk,sd,smp,sma,d1,d2,d3,s1,s2,s3',
        'alamat_jalan' => 'required|string|max:255',
        'alamat_rt' => 'required|digits:3',               
        'alamat_rw' => 'required|digits:3',               
        'alamat_desa' => 'required|string|max:255',
        'alamat_kecamatan' => 'required|string|max:255',
        'alamat_kabupaten' => 'required|string|max:255',
        'alamat_provinsi' => 'required|string|max:255',
        'kodepos' => 'required|digits:5',                 
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // 5. Simpan data yang sudah tervalidasi ke database
    PendudukModel::create($validator->validated());

    // 6. Redirect ke halaman utama dengan pesan sukses
    return redirect('/penduduk')->with('success', 'Data penduduk berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penduduk = PendudukModel::where('id', $id)->firstOrFail();

        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penduduk = PendudukModel::where('id', $id)->firstOrFail();

        return view('penduduk.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'nik' => 'required|digits:16|unique:penduduk,nik,' . $id,
            'no_kk' => 'required|digits:16',
            'nama_lengkap' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:islam,katolik,kristen,hindu,budha,konghucu',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|in:tidak sekolah,tk,sd,smp,sma,d1,d2,d3,s1,s2,s3',
            'alamat_jalan' => 'required|string|max:255',
            'alamat_rt' => 'required|digits:3',
            'alamat_rw' => 'required|digits:3',
            'alamat_desa' => 'required|string|max:255',
            'alamat_kecamatan' => 'required|string|max:255',
            'alamat_kabupaten' => 'required|string|max:255',
            'alamat_provinsi' => 'required|string|max:255',
            'kodepos' => 'required|digits:5',
        ]);

        $penduduk = PendudukModel::findOrFail($id);
        $penduduk->update($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $penduduk = PendudukModel::findOrFail($id);
      $penduduk->delete();
      return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus!');
    }
}
