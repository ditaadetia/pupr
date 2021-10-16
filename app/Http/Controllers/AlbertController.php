<?php

namespace App\Http\Controllers;

use App\Models\Albert;
use Illuminate\Http\Request;
use Storage;

class AlbertController extends Controller
{
    public function index()
    {
        $alberts = Albert::all();
        return view('alat_berat', compact('alberts'));
    }

    public function create()
    {
        return view('tambah_alat');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required:255',
            'foto' => 'image|file|max:1024|mimes:png,jpg,jpeg',
            'jenis' => 'required:255',
            'kegunaan' => 'required:255',
            'harga_sewa_perjam' => 'required:11',
            'harga_sewa_perhari' => 'required:11',
            'keterangan' => 'required:255',
            'kondisi' => 'required:255',
        ]);

        if($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('gambar_albert');
        }

        Albert::create($validatedData);
        if($validatedData){
            return redirect('alat_berat')->with('success', 'Alat berat berhasil ditambahkan!');
        } else {
            return redirect('alat_berat')->with('error', 'Alat berat gagal ditambahkan!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Albert $alberts)
    {
        return view('edit_alat', ['alberts' => $alberts]);
    }

    public function update(Request $request, Albert $alberts)
    {
        $this->validate($request, [
            'nama' => 'required:255',
            'jenis' => 'required:255',
            'kegunaan' => 'required:255',
            'harga_sewa_perjam' => 'required:11',
            'harga_sewa_perhari' => 'required:11',
            'keterangan' => 'required:255',
            'kondisi' => 'required:255',
        ]);

        //get data post by ID
        $alberts = Albert::findOrFail($alberts->id);

        if($request->file('foto') == "") {

            $alberts->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'kegunaan' => $request->kegunaan,
                'harga_sewa_perjam' => $request->harga_sewa_perjam,
                'harga_sewa_perhari' => $request->harga_sewa_perhari,
                'keterangan' => $request->keterangan,
                'kondisi' => $request->kondisi,
            ]);

        } else {

            //hapus old image
            // Storage::disk('local')->delete('gambar_albert'.$alberts->foto);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('gambar_albert', $image->hashName());

            $alberts->update([
                'nama' => $request->nama,
                'image'     => $image->hashName(),
                'jenis' => $request->jenis,
                'kegunaan' => $request->kegunaan,
                'harga_sewa_perjam' => $request->harga_sewa_perjam,
                'harga_sewa_perhari' => $request->harga_sewa_perhari,
                'keterangan' => $request->keterangan,
                'kondisi' => $request->kondisi,
            ]);

        }

        if($alberts){
            //redirect dengan pesan sukses
            return redirect('alat_berat')->with('success', 'Alat berat berhasil diubah!');
         }else{
            //redirect dengan pesan error
            return redirect('alat_berat')->with('error', 'Alat berat gagal diubah!');
         }
    }

    public function destroy($id)
    {
        //
    }
}
