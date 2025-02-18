<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    function getPackages()
    {
        $packages = Package::orderBy('package_name')->get();
        return view('/packages', compact('packages'));
    }

    function formRegisterPackage()
    {
        $package = new Package();
        $package->id = 0;
        return view('/admin/register_package', compact('package'));
    }

    function registerPackage(Request $request)
    {
        if ($request->input('id') == 0) {
            $package = new Package();
        } else {
            $package = Package::find($request->input('id'));
        }
        $package->package_name = $request->input('package_name');
        $package->save();
        return redirect('/admin/embalagens');
    }

    function formUpdatePackage($id)
    {
        $package = Package::find($id);
        return view('/admin/register_package', compact('package'));
    }

    public function deletePackage($id)
    {
        $product = Package::find($id);
        $product->delete();
        return redirect('/admin/embalagens');
    }
}
