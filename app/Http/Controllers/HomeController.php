<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sections = $this->sectionsProducts();
        return view('welcome', compact('sections'));
    }

    public function sectionsProducts()
    {
        $sections = Section::with(['products'])->orderBy('section_name')->get();
        return $sections;
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Product::whereRaw('product_name ILIKE ?', ["%{$search}%"])->get();
        return view('results', compact('search', 'results'));
    }
}
