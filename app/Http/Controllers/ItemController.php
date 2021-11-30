<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }


    public function create(Request $request)
    {
        $item = new Item;
        $item->nama_item = $request->nama_item;
        $item->unit = $request->unit;
        $item->stok = $request->stok;
        $item->harga_satuan = $request->harga_satuan;
        $item->barang = $request->barang;
        $item->save();
        return "Data Berhasil Masuk";
    }

    public function update(Request $request, $id)
    {
        $nama_item = $request->nama_item;
        $unit = $request->unit;
        $stok = $request->stok;
        $harga_satuan = $request->harga_satuan;
        $barang = $request->barang;
        $item = Item::find($id);
        $item->nama_item = $nama_item;
        $item->unit = $unit;
        $item->stok = $stok;
        $item->harga_satuan = $harga_satuan;
        $item->barang = $barang;
        $item->save();
        return "Berhasil Diubah";
    }

    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return "Berhasil Hapus";
    }
}
