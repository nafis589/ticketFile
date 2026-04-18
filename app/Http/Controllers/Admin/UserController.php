<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'en_attente')->get();
        return view('admin.users.pending', compact('users'));
    }

    public function approve(User $user)
    {
        $user->update(['status' => 'actif']);
        return redirect()->route('admin.users.pending')->with('status', 'Compte validé avec succès');
    }
}
