<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first() ?? new Profile();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'phone_alt' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'marital_status' => 'nullable|string|max:50',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'website_url' => 'nullable|url|max:255',
            'languages' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'remove_photo' => 'nullable|boolean',
        ]);

        $profile = Profile::first();

        // Manejar eliminación de foto
        if ($request->boolean('remove_photo') && $profile?->photo_path) {
            $oldPhoto = public_path($profile->photo_path);
            if (File::exists($oldPhoto)) {
                File::delete($oldPhoto);
            }
            $validated['photo_path'] = null;
        }

        // Manejar subida de nueva foto
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Eliminar foto anterior si existe
            if ($profile?->photo_path) {
                $oldPhoto = public_path($profile->photo_path);
                if (File::exists($oldPhoto)) {
                    File::delete($oldPhoto);
                }
            }

            $file = $request->file('photo');
            $filename = 'profile-' . Str::slug($validated['full_name']) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/profiles';
            $file->move(public_path($path), $filename);
            $validated['photo_path'] = $path . '/' . $filename;
        }

        unset($validated['photo'], $validated['remove_photo']);

        if ($profile) {
            $profile->update($validated);
        } else {
            Profile::create($validated);
        }

        return redirect()->route('admin.profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}
