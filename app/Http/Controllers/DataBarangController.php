<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    public function listBarang()
    {
        //ambil semua data barang dari database atau migration
        $barangData = DataBarang::all();

        return view('barang.index', compact('barangData'));
    }

    public function tambahBarang()
    {
        return view('barang.create');
    }

    public function simpanBarang(Request $request)
    {
        $request->validate([
            'idbarang' => 'required|unique:data_barang,idbarang|max:200',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'required|image|max:1999',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        }

        DataBarang::create([
            'idbarang' => $request->idbarang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('data-barang.index');
    }

    public function editBarang($idbarang)
    {
        //ambil data berdasarkan idbarang
        $barang = DataBarang::findOrFail($idbarang);

        //return ke view dengan membawa data barang untuk di edit
        return view('barang.edit', compact('barang'));
    }

    public function updateBarang(Request $request, $idbarang)
    {

        //validasi input
        $request->validate([
        'idbarang' => 'required|max:200',
        'nama_barang' => 'required|string|max:299',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'foto' => 'nullable|image|max:1999',
        ]);

        //temukan barang berdasarkan idbarang
        $barang = DataBarang::findOrFail($idbarang);
        
        // update data barang
        $barang->idbarang = $request->input('idbarang');
        $barang->nama_barang = $request->input('nama_barang');
        $barang->harga = $request->input('harga');
        $barang->stok = $request->input('stok');

        //ambil data yang ingin di update
        $updateData = $request->only(['idbarang', 'nama_barang', 'harga', 'stok',]);

        //cek apakah ada foto baru yang di upload
        if ($request->hasFile('foto')) {
            //jika ada foto baru, hapus foto lama (jika ada)
            if ($barang->foto && Storage::exists('public/' . $barang->foto)){
                //menghapus foto lama dari storage
                Storage::delete('public/' . $barang->foto);
            }
            //upload foto baru
        $fotoPath = $request->file('foto')->store('fotos', 'public');
        //tambahkan path foto baru ke data yang akan di update
        $updateData['foto'] = $fotoPath;
        }

        //simpan perubahan ke database
        $barang->update($updateData);

        //redirect ke halaman daftar barang
        return redirect()->route('data-barang.index');
    }

    public function detailBarang($idbarang)
    {
        $barang = DataBarang::findOrFail($idbarang);

        return view('barang.detail', compact('barang'));
    }

    public function hapusBarang($idbarang)
    {
        $barang = DataBarang::findOrFail($idbarang);
        $barang->delete();
        return redirect()->route('data-barang.index');
    }
}
