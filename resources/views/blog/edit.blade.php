@extends('base')

@section('title', 'modifier un article')

@section('content')
<div class="container mt-5">
        <h1>Modifier une tâche</h1>
        <form method="POST" action="{{ route('blog.update', $tache->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Tache à faire</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $tache->title)}}" required>

                @error("title")
                    {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea class="form-control" id="content" name="content"required>{{old('content', $tache->content)}}</textarea>

                @error("content")
                    {{$message}}
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