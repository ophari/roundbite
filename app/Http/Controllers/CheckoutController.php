<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Keranjang::all();
        $totalHarga = $cart->map(function ($item) {
            return $item->price_per_unit * $item->jumlah_barang;
        })->sum();
        return view('checkout', compact('cart','totalHarga'));
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
    // Mengisi nilai default untuk 'user_id' dan 'status'
    $request->merge([
        'user_id' => 1, // Nilai default untuk 'user_id'
        'status' => 'mengambil pesanan', // Nilai default untuk 'status'
    ]);

    $request->validate([
        'user_id' => 'required', 
        'metode_pembayaran' => 'required',
        'total_price' => 'required',
        'status' => 'required', 
    ]);

    $checkout = Checkout::create($request->all());

    if($checkout) { 
        Keranjang::truncate(); 
    }

    return redirect('checkout');
}


    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
