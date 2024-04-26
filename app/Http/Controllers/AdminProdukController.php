<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        $produk = Produk::paginate(5);
        return view('admin.produk' , compact('data','produk'));
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
    $validator = Validator::make($request->all(), [
        'produk_name' => 'required',
        'deskripsi' => 'required',
        'price' => 'required',
        'category_id' => 'required', // Validasi keberadaan kategori
        'image_url' => 'required' // Validasi file gambar
    ]);
    
    // Cek apakah validasi gagal
    if ($validator->fails()) {
        return redirect('/admin_produk')->with('error', 'Gagal menambahkan produk');
    }

    // Cek apakah ada file yang diunggah
    if ($request->hasFile('image_url')) {
        $imagePath = $request->file('image_url')->store('public/images');
        $imageUrl = basename($imagePath); // Mengambil nama file gambar

        Produk::create(array_merge($request->all(), ['image_url' => $imageUrl]));

        return redirect('/admin_produk')->with('success', 'Produk sudah ditambahkan');
    } else {
        return redirect('/admin_produk')->with('error', 'Gagal menambahkan produk');
    }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'produk_name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image_url' => 'required' // Validasi file gambar
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Gagal memperbarui produk');
        }
    
        // Temukan produk yang akan diperbarui
        $produk = Produk::findOrFail($id);
    
        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('image_url')) {
            // Hapus gambar lama
            Storage::delete('public/images/' . $produk->image_url);
    
            // Unggah gambar baru
            $imagePath = $request->file('image_url')->store('public/images');
            $imageUrl = basename($imagePath);
    
            // Perbarui atribut image_url
            $produk->image_url = $imageUrl;
        }
    
        // Perbarui atribut lainnya
        $produk->produk_name = $request->produk_name;
        $produk->deskripsi = $request->deskripsi;
        $produk->price = $request->price;
        $produk->category_id = $request->category_id;
    
        // Simpan perubahan
        $produk->save();
    
        return redirect()->back()->with('success', 'Produk berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Cari produk berdasarkan ID
    $produk = Produk::find($id);

    // Jika produk tidak ditemukan
    if (!$produk) {
        return redirect('/admin_produk')->with('error', 'Produk tidak ditemukan');
    }

    // Hapus produk
    $produk->delete();

    // Redirect kembali ke halaman produk dengan pesan sukses
    return redirect('/admin_produk')->with('success', 'Produk berhasil dihapus');
}

    
}
