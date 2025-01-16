<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Affiche la liste de tous les utilisateurs
    public function index()
    {
       
        $users = User::all();

        
        return view('users.index', compact('users'));
    }

    // Affiche les détails d'un utilisateur 
    public function show($id)
    {
        
        $user = User::findOrFail($id);

       
        return view('users.show', compact('user'));
    }

    // Affiche le formulaire de création 
    public function create()
    {
    
        return view('users.create');
    }

    // Affiche le formulaire de modification pour un utilisateur spécifique
    public function edit($id)
    {
      
        $user = User::findOrFail($id);

       
        return view('users.edit', compact('user'));
    }

    // Met à jour les informations d'un utilisateur 
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255', // Le nom est obligatoire, de type texte et max 255 caractères
            'email' => 'required|email|unique:users,email,' . $id, // L'email doit être unique sauf pour l'utilisateur actuel
        ]);

        // Trouver l'utilisateur par son ID
        $user = User::findOrFail($id);

     
        $user->update($request->only(['name', 'email']));

        
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Enregistre un nouvel utilisateur dans la base de données
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:50', // Le nom est obligatoire et max 50 caractères
            'email' => 'required|email|unique:users,email', // L'email est unique dans la table des utilisateurs
            'password' => 'required|string|min:5', // Le mot de passe doit avoir au moins 5 caractères
        ]);

        // Créer un nouvel utilisateur avec les données validées
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Le mot de passe est hashé pour la sécurité
        ]);

       
        session()->flash('success', 'Utilisateur créé avec succès !');

     
        return redirect()->route('blog.index');
    }

    // Supprime un utilisateur de la base de données
    public function destroy($id)
    {
    
        $user = User::findOrFail($id);

       
        $user->delete();

      
        return redirect()->route('blog.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
