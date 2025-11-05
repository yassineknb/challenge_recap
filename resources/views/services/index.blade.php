<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tous les Services</title>
</head>
<body>
    <h1>Liste des Services</h1>
    
    @auth
        <a href="{{ route('services.create') }}">Créer un nouveau service</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    @else
        <a href="{{ route('login') }}">Connexion</a>
    @endauth

    @foreach($services as $service)
        <div>
            <h2><a href="{{ route('services.show', $service) }}">{{ $service->title }}</a></h2>
            <p>{{ $service->price }} €</p>
            
            @can('update', $service)
                <a href="{{ route('services.edit', $service) }}">Modifier</a>
            @endcan
        </div>
    @endforeach
</body>
</html>