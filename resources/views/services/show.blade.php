<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $service->title }}</title>
</head>
<body>
    <h1>{{ $service->title }}</h1>
    <p>{{ $service->description }}</p>
    <p>Prix: {{ $service->price }} €</p>
    
    @if($service->image)
        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" width="400">
    @endif

    @can('update', $service)
        <a href="{{ route('services.edit', $service) }}">Modifier le service</a>
    @endcan

    @can('delete', $service)
        <form action="{{ route('services.destroy', $service) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endcan
</body>
</html>