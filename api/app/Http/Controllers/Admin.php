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

    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('home');
    }
}
