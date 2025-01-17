<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function getSections()
    {
        $sections = Section::orderBy('section_name')->get();
        return view("/sections", compact('sections'));
    }

    public function formRegisterSection()
    {
        $section = new Section();
        $section->id = 0;
        return view("/admin/register_section", compact('section'));
    }

    public function registerSection(Request $request)
    {
        if ($request->input('id') == 0) {
            $section = new Section();
        } else {
            $section = Section::find($request->input('id'));
        }
        $section->section_name = $request->input('section_name');
        $section->save();
        return redirect('/admin/secoes');
    }

    public function formUpdateSection($id)
    {
        $section = Section::find($id);
        return view('/admin/register_section', compact('section'));
    }

    public function deleteSection($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect('/admin/secoes');
    }
}
