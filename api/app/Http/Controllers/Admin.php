<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Admin extends Controller
{
    public function index() {
        
        return view('pages.admin.users', [
            'users' => User::all(),
        ]);
    }

    public function delete(Request $request) {
        $validated = $request->validate([
            'id' => ['required', 'exists:users,id'],
        ]);

        User::where('id', $validated['id'])->delete();

        return back()->with('success', 'User deleted successfully');
    }


    public function edit(Request $request) {
        $validated = $request->validate([
            'id'    => 'required|exists:users,id',
            'name'  => 'required|string|max:255',
            'file'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8182',
        ]);

        
        $user = User::find($validated['id']);
        $user->name = $validated['name'];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $filename = md5($user->id) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/profile', $filename, 'public');
            $user->profile_pic = $filename;
        }
        
        $user->save();

        return back()->with('success', 'User edited successfully');
    }

    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('home');
    }
}
