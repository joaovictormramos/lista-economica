<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function getStores()
    {
        $stores = Store::orderBy('store_name')->get();
        return view('/stores', compact('stores'));
    }

    public function formRegisterStore()
    {
        $store = new Store();
        $store->id = 0;
        return view('/admin/register_store', compact('store'));
    }

    public function registerStore(Request $request)
    {
        if ($request->input('id') == 0) {
            $store = new Store();
        } else {
            $store = Store::find($request->input('id'));
        }
        if ($request->hasFile('store_img')) {
            $img = $request->file('store_img');
            $path = $img->store('public/images');
            $arrayImg = explode('/', $path);
            $fileName = end($arrayImg);
            if ($store->store_img != "") {
                Storage::delete("public/images/" . $store->store_img);
            }
            $store->store_img = $fileName;
        }
        $store->store_name = $request->input('name');
        $store->store_address = $request->input('address');
        $store->save();
        return redirect('/admin/estabelecimentos');
    }

    public function formUpdateStore($id)
    {
        $store = Store::find($id);
        return view('/admin/register_store', compact('store'));
    }

    public function deleteStore($id)
    {
        $store = Store::find($id);
        if ($store->store_img != "") {
            Storage::delete("public/images/" . $store->store_img);
        }
        $store->delete();
        return redirect('/admin/estabelecimentos');
    }

    public function getLocation()
    {

    }

}
