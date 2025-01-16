<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Affiche la vue de connexion
    public function login()
    {
        return view('auth.login'); // Retourne la page de connexion
    }

    // Déconnecte l'utilisateur
    public function logout()
    {
        Auth::logout(); // Déconnecte l'utilisateur
        return to_route('auth.login'); // Redirige vers la page de connexion
    }

    // Gère la tentative de connexion de l'utilisateur
    public function doLogin(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email', // L'email est requis et doit être au bon format
            'password' => 'required|string|min:4', // Le mot de passe est requis avec une longueur minimale de 4 caractères
        ]);

       
        $credentials = $request->only('email', 'password');

        //  connecte l'utilisateur avec les informations fournies
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('blog.index')); 
        }

        
        return to_route('auth.login')->withErrors([
            'email' => "Email ou mot de passe invalide", // Message d'erreur
        ])->onlyInput('email'); // Conserve l'email saisi
    }
}
