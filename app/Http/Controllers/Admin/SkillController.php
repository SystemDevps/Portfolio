<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('category')->orderBy('sort_order')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'level' => 'required|integer|min:0|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Habilidad creada correctamente.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'level' => 'required|integer|min:0|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Habilidad actualizada correctamente.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Habilidad eliminada correctamente.');
    }
}
