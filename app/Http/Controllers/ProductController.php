<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Package;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with(['brand', 'package'])->get();
        //var_dump($products);
        return view('/products', compact('products'));
    }

    public function formRegisterProduct()
    {
        $product = new Product();
        $product->id = 0;
        $brands = Brand::all();
        $sections = Section::all();
        $packages = Package::all();
        return view('/admin/register_product', compact('product', 'brands', 'sections', 'packages'));
    }

    public function registerProduct(ProductRequest $productRequest)
    {
        if ($productRequest->input('id') == 0) {
            $product = new Product();
        } else {
            $product = Product::find($productRequest->input('id'));
        }

        if ($productRequest->hasFile('product_img')) {
            $img = $productRequest->file('product_img');
            $path = $img->store('public/images');
            $arrayImg = explode('/', $path);
            $fileName = end($arrayImg);
            if ($product->product_img != "") {
                Storage::delete("public/images/" . $product->product_img);
            }
            $product->product_img = $fileName;
        }
        $product->product_name = $productRequest->input('name');
        $product->brand_id = $productRequest->input('brand_id');
        $product->product_description = $productRequest->input('description');
        $product->product_measurement = $productRequest->input('measurement');
        $product->product_unity_measurement = $productRequest->input('unity_measurement');
        $product->package_id = $productRequest->input('package');
        $product->section_id = $productRequest->input('section');
        $product->save();
        return redirect('/admin/produtos');
    }

    public function formUpdateProduct($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $sections = Section::all();
        $packages = Package::all();
        return view('/admin/register_product', compact('product', 'brands', 'sections', 'packages'));
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->product_img != "") {
            Storage::delete("public/images/" . $product->product_img);
        }
        $product->delete();
        return redirect('/admin/produtos');
    }
}
