<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'experiences' => Experience::count(),
            'education' => Education::count(),
            'skills' => Skill::count(),
            'projects' => Project::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::where('read', false)->count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
