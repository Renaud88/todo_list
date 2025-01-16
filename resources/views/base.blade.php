<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('blog.index') }}">Liste des taches</a>
            <a class="navbar-brand" href="{{route('users.index') }}">Liste des utilisateurs</a>
            <a class="navbar-brand" aria-current="page" href="{{ route('tache.create') }}">Ajouter une tache</a>
            <a class="navbar-brand" aria-current="page" href="{{ route('users.create') }}">Ajouter un utilisateur</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        
                    </li>

                    <li class="nav-item">
                       
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        <li class="nav-item">
                            <form class="nav-item" action="{{route('auth.logout')}}" method="post">
                                @method("delete")
                                @csrf
                            <button>Deconnection</button>
                            </form>
                        </li>

                            </a>
                            </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('auth.login') }}">
                                Connexion
                            </a>
                        </li>
                    @endguest
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @yield('content')
    </div>

   

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
