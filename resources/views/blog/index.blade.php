@extends('base')

@section('title', 'Liste des Tâches')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Liste des Tâches</h2>
    <table class="table table-striped table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th scope="col">Nom de l'utilisateur</th>
                <th scope="col">Titre</th>
                <th scope="col">Contenu</th>
                <th scope="col">Statut</th>
                <th scope="col">Priorité</th>
                <th scope="col">Action tâche</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taches as $tache)
                <tr class="
                        @if ($tache->status == 'à faire')
                            table-danger
                        @elseif ($tache->status == 'en cours')
                            table-warning
                        @elseif ($tache->status == 'fait')
                            table-success
                        @endif">
                    <td>{{ $tache->user->name }}</td>
                    <td>{{ $tache->title }}</td>
                    <td>{{ $tache->content }}</td>
                    <td class="text-center">
                        <a href="{{ route('blog.updateStatus', $tache->id) }}" class="btn btn-sm btn-outline-primary">
                            {{ ucfirst($tache->status) }}
                        </a>
                    </td>
                    <td class="text-center">
                        <span class="badge 
                            @if($tache->priority === 'urgent') bg-danger 
                            @else bg-secondary @endif">
                            {{ ucfirst($tache->priority) }}
                        </span>
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="{{ route('taches.show', ['id' => $tache->id]) }}" class="btn btn-sm btn-primary">Lire</a>
                        <a href="{{ route('blog.edit', $tache->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('blog.destroy', $tache->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
