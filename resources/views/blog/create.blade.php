@extends('base')

@section('title', 'Créer un article')

@section('content')
<div class="container mt-5">

    
    <form method="POST" action="{{ route('tache.store') }}">
        
       
        <h4>Informations de l'utilisateur</h4>
        <div class="mb-3">
            <label for="user_id" class="form-label">Choisir un utilisateur</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Sélectionner un utilisateur</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

          
            @error("user_id")
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        @csrf  

        
        <h4>Créer une nouvelle tâche</h4>
        <div class="mb-3">
            <label for="title" class="form-label">Tâche à faire</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>

            
            @error("title")
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="content" name="content" required>{{ old('content') }}</textarea>

        
            @error("content")
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-3">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="à faire">À faire</option>
                <option value="en cours">En cours</option>
                <option value="fait">Fait</option>
            </select>
        </div>

       
        <div class="mb-3">
            <label for="priority">Priorité</label>
            <select name="priority" id="priority" class="form-control" required>
                <option value="urgent">Urgent</option>
                <option value="pas urgent">Pas urgent</option>
            </select>
        </div>

       
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>
</div>
@endsection
