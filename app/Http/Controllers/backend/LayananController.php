<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::with('Kategoris')->get();
        return view('backend.layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('backend.layanan.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategoris,id',
            'link' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        //upload image
        $image = $request->file('foto');
        $fotoName = null;
        if ($image) {
            $image->storeAs('layanan', $image->hashName());
            $fotoName = $image->hashName();
        }

        //create 
        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'kategori_id' => $request->kategori_id,
            'link' => $request->link,
            'foto' => $fotoName,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanans = Layanan::find($id);
        $kategoris = kategori::get();

        return view('backend.layanan.edit', compact('layanans', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'kategori_id' => 'required|exists:kategoris,id',
            'link' => 'required|string|max:250',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //get product by ID
        $layanans = Layanan::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto')) {
            //delete old image
            Storage::delete('layanan/' . $layanans->foto);

            //upload new image
            $image = $request->file('foto');
            $image->storeAs('layanan', $image->hashName());

            //update product with new image
            $layanans->update([
                'nama_layanan' => $request->nama_layanan,
                'kategori_id' => $request->kategori_id,
                'link' => $request->link,
                'foto' => $image->hashName(),
            ]);
        } else {
            //update without image
            $layanans->update([
                'nama_layanan' => $request->nama_layanan,
                'kategori_id' => $request->kategori_id,
                'link' => $request->link,
            ]);
        }

        //redirect to index
        return redirect()->route('layanan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $layanans = Layanan::findOrFail($id);

        //delete image
        Storage::delete('layanan/' . $layanans->foto);

        //delete image
        $layanans->delete();

        //redirect to index
        return redirect()->route('layanan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
