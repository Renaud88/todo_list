@extends('base')

@section('title', 'Détails de l\'utilisateur')

@section('content')
<div class="container mt-5">
    <h2>Détails de l'utilisateur</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email :</strong> {{ $user->email }}</li>
       
    </ul>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
