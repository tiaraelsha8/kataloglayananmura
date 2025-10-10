<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('backend.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'nama_kategori' => 'required',
            'foto' => 'image|mimes:png|max:2048',
        ]);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('kategori', $image->hashName());

        //create Logo
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'foto' => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $kategoris = kategori::find($id);
        return view('backend.kategori.edit', compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'foto' => 'image|mimes:png|max:2048',
        ]);

        //get product by ID
        $kategoris = Kategori::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto')) {
            //delete old image
            Storage::delete('kategori/' . $kategoris->foto);

            //upload new image
            $image = $request->file('foto');
            $image->storeAs('kategori', $image->hashName());

            //update product with new image
            $kategoris->update([
                'nama_kategori' => $request->nama_kategori,
                'foto' => $image->hashName(),
            ]);
        } else {
            //update without image
            $kategoris->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
        }

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $Kategoris = Kategori::findOrFail($id);

        //delete image
        Storage::delete('kategori/' . $Kategoris->foto);

        //delete image
        $Kategoris->delete();

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
