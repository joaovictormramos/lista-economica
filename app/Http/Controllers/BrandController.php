<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function getBrands()
    {
        $brands = Brand::orderBy('brand_name')->get();
        return view("/brands", compact('brands'));
    }

    public function formRegisterBrand()
    {
        $brand = new Brand();
        $brand->id = 0;
        return view("/admin/register_brand", compact('brand'));
    }

    public function registerBrand(Request $request)
    {
        if ($request->input('id') == 0) {
            $brand = new Brand();
        } else {
            $brand = Brand::find($request->input('id'));
        }
        if ($request->hasFile('brand_img')) {
            $img = $request->file('brand_img');
            $path = $img->store('public/images');
            $arrayImg = explode('/', $path);
            $fileName = end($arrayImg);
            if ($brand->brand_img != "") {
                Storage::delete("public/images/" . $brand->brand_img);
            }
            $brand->brand_img = $fileName;
        }
        $brand->brand_name = $request->input('brand_name');
        $brand->save();
        return redirect('/admin/marcas');
    }

    public function formUpdateBrand($id)
    {
        $brand = Brand::find($id);
        return view('/admin/register_brand', compact('brand'));
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        if ($brand->brand_img != "") {
            Storage::delete("public/images/" . $brand->brand_img);
        }
        $brand->delete();
        return redirect('/admin/marcas');
    }
}