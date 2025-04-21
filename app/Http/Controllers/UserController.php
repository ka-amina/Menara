<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $interviewers = User::where('role', 'interviewer')->get();
        // dd($interviewers->email);
        // $companies=User::where('role','company')->get();
        return view('users.index', compact('interviewers'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // dd($user->name);
        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {

        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'          => 'nullable|string|max:20',
            'bio'            => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',

        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->bio   = $validated['bio'] ?? null;

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
    
            $path = $request->file('avatar')->store('company_logos', 'public');
            $user->avatar = $path;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
