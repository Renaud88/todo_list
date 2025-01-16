<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tache;
use Illuminate\Http\Request;


class TacheController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        $taches = Tache::orderBy('status')->get(); 
        return view('blog.index', compact('taches')); 
    }

    // Affiche le formulaire de création de tâche
    public function create()
    {
        $users = User::all(); 
        return view('blog.create', compact('users'));
    }

    // Enregistre une nouvelle tâche associée à un utilisateur
    public function store(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,id', // Vérifie si l'utilisateur existe
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:à faire,en cours,fait', // Statut valide
            'priority' => 'required|in:urgent,pas urgent', // Priorité valide
        ]);

       
        Tache::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'priority' => $request->priority,
            'user_id' => $request->user_id, // Lien avec l'utilisateur
        ]);

       
        session()->flash('success', 'La tâche a été créée avec succès !');

     
        return redirect()->route('blog.index');
    }

    // Affiche les détails d'une tâche 
    public function show($id)
    {
        $tache = Tache::with('user')->findOrFail($id); 
        return view('blog.show', [
            'tache' => $tache,
            'user' => $tache->user 
        ]);
    }

    // Affiche le formulaire de modification pour une tâche 
    public function edit($id)
    {
        $tache = Tache::findOrFail($id);
        return view('blog.edit', ['tache' => $tache]);
    }

    // Met à jour une tâche 
    public function update($id)
    {
        $tache = Tache::findOrFail($id); 

        
        $tache->update([
            'title' => request('title'),
            'content' => request('content'),
            'status' => request('status'),
            'priority' => request('priority'),
        ]);

       
        session()->flash('success', 'La tâche a été modifiée avec succès !');

        
        return redirect()->route('blog.index');
    }

    // Supprime une tâche 
    public function destroy($id)
    {
        $tache = Tache::findOrFail($id); 
        $tache->delete(); 

        
        session()->flash('success', 'La tâche a été supprimée avec succès !');

        
        return redirect()->route('blog.index');
    }

    // Met à jour le statut d'une tâche 
    public function updateStatus($id)
    {
        $tache = Tache::findOrFail($id); 

        
        if ($tache->status == 'à faire') {
            $tache->status = 'en cours';
        } elseif ($tache->status == 'en cours') {
            $tache->status = 'fait';
        } else {
            $tache->status = 'à faire';
        }

        $tache->save(); 

       
        return redirect()->route('blog.index');
    }
}
