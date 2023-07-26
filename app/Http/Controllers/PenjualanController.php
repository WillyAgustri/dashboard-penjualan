<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenjualanRequest;
use App\Models\Sales;
use Hashids\Hashids;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /* untuk Admin */
    public function index()
    {
        // To Display Sales with paginate 5 per row
        $data_penjualan = Sales::paginate(5);

        return view('sales.dashboard', compact('data_penjualan'));
    }

    public function show_product()
    {
        // To Display Sales with paginate 5 per row
        $data_penjualan = Sales::paginate(10);

        return view('ShopInterface.ShopHome', compact('data_penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenjualanRequest $request)
    {
        // Mengvalidasi Request Dari Form
        $data = $request->validate([
            // Ini adalah name dari atribut input pada form gunanya sebagai
            // Aturan atau istilahnya Validasi
            'product_id' => 'required| max:10',
            'product_name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'picture' => '',
        ]);

        // Untuk Menyimpan picture ke Folder Storage
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('', $fileName, 'public');
            $data['picture'] = $filePath;
        }

        // Menginisialisasi Hashid untuk mengencripsi product_id
        $hashids = new Hashids();

        // Mendapatkan product_id dari array $data,
        // Yang nantinya di encode dengan hashids
        $data['product_id'] = $hashids->encode($data['product_id']);

        // Membuat Data
        Sales::create($data);

        // Kembali ke route index
        return redirect()->route('index');
    }

    public function show($product_id)
    {
        $data = Sales::find($product_id);

        $hashids = new Hashids();
        $decryptedProductId = $hashids->decode($data['product_id']);

        return view('sales.edit')->with([
        'product_id' => $decryptedProductId[0],
        'product_name' => $data->product_name,
        'brand' => $data->brand,
        'quantity' => $data->quantity,
        'price' => $data->price,
        'picture' => $data->price,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        Sales::destroy($product_id);

        return redirect()->route('index');
    }
}