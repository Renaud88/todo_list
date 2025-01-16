@extends('base')

@section('title', 'Détails de la Tâche')

@section('content')
<div class="container mt-5">
    <h2>Détails de la Tâche : {{ $tache->title }}</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Titre: {{ $tache->title }}</h5>
            <p class="card-text">Contenu: {{ $tache->content }}</p>
            <p class="card-text">Statut: 
                <span class="badge 
                    @if($tache->status === 'à faire') bg-warning 
                    @elseif($tache->status === 'en cours') bg-primary 
                    @else bg-success @endif">
                    {{ ucfirst($tache->status) }}
                </span>
            </p>
            <p class="card-text">Priorité: 
                <span class="badge 
                    @if($tache->priority === 'urgent') bg-danger 
                    @else bg-secondary @endif">
                    {{ ucfirst($tache->priority) }}
                </span>
            </p>
            <p class="card-text">Utilisateur: {{ $user->name }} ({{ $user->email }})</p>
            
        </div>
    </div>
</div>
@endsection
