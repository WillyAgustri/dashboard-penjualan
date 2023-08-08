<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Models\Sales;
use Hashids\Hashids;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * untuk Admin.
     *
     * */
    public function showDashboard()
    {
        // To Display Sales with paginate 5 per row
        $data_penjualan = Sales::paginate(5);

        return view('sales.dashboard', compact('data_penjualan'));
    }

    public function showProduct()
    /*
    Menampilkan data
    */
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
        $data = $request->validate([
            'product_id' => 'required|max:10',
            'product_name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'picture' => '',
        ]);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('', $fileName, 'public');
            $data['picture'] = $filePath;
        }

        $hashids = new Hashids();

        $data['product_id'] = $hashids->encode($data['product_id']);

        // Membuat Data
        Sales::create($data);

        return redirect()->route('show-dashboard');
    }

    public function edit($product_id)
    {
        $data = Sales::find($product_id);
        $hashids = new Hashids();
        $decryptedProductId = $hashids->decode($data['product_id']);

        return view('sales.edit', compact('data'))->with(['product_id' => $decryptedProductId[0]]);
    }

    public function proses_edit(UpdatePenjualanRequest $request, $product_id)
    {
        $update_data = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'picture' => '',
        ]);

        $data = Sales::find($product_id);
        $data->product_name = $update_data['product_name'];
        $data->brand = $update_data['brand'];
        $data->quantity = $update_data['quantity'];
        $data->price = $update_data['price'];

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('', $fileName, 'public');
            $data->picture = $filePath;
        }
        $data->save();

        return redirect()->route('show-dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        $findId = Sales::find($product_id);
        Sales::destroy($product_id);

        return redirect()->back()->with('success', $findId->product_name.' Berhasil Dihapus');
    }
}