<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Message;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $experiences = Experience::orderBy('sort_order')->orderBy('start_date', 'desc')->get();
        $education = Education::orderBy('sort_order')->orderBy('start_date', 'desc')->get();
        $skills = Skill::orderBy('category')->orderBy('sort_order')->get()->groupBy('category');
        $projects = Project::orderBy('sort_order')->orderBy('created_at', 'desc')->get();

        return view('portfolio.index', compact('profile', 'experiences', 'education', 'skills', 'projects'));
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Message::create($validated);

        return back()->with('success', '¡Mensaje enviado correctamente! Te responderé pronto.');
    }
}
