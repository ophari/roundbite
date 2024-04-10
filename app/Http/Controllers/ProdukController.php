<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        $produk = Produk::paginate(5);
        return view('produk' , compact('data','produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk_name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
            'category_id' => 'required', // Validasi keberadaan kategori
            'image_url' => 'required' // Validasi file gambar
        ]);
    
        // Cek apakah ada file yang diunggah
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('public/images');
            $imageUrl = basename($imagePath); // Mengambil nama file gambar
    
            Produk::create(array_merge($validatedData, ['image_url' => $imageUrl]));
    
            return redirect('/produk')->with('success', 'Produk created successfully');
        } else {
            return redirect('/produk')->with('error', 'No image uploaded.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
