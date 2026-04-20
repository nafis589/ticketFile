<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche la liste des utilisateurs en attente
    public function index()
    {
        // Récupération des utilisateurs avec le statut "en_attente"
        $users = User::where('status', 'en_attente')->get();

        // Retourne la vue avec les données
        return view('admin.users.pending', compact('users'));
    }

    // Valide (approuve) un utilisateur
    public function approve(User $user)
    {
        // Met à jour le statut de l'utilisateur
        $user->update(['status' => 'actif']);

        // Redirige avec un message de succès
        return redirect()->route('admin.users.pending')
                         ->with('status', 'Compte validé avec succès');
    }
}