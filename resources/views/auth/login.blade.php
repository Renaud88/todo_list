@extends("base")

@section("content")
    <h1>Se connecter</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error("email")
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error("password")
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Se connecter</button>
            </form>

            <div class="mt-3 text-center">
                <p>Vous n'avez pas de compte ? 
                    <a href="{{ route('users.create') }}">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>
@endsection
