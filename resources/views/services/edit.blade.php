<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier {{ $service->title }}</title>
</head>
<body>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}">
        </div>
        
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description">{{ old('description', $service->description) }}</textarea>
        </div>
        
        <div>
            <label for="duration">Durée (minutes) :</label>
            <input type="number" id="duration" name="duration" value="{{ old('duration', $service->duration) }}">
        </div>

        <div>
            <label for="price">Prix :</label>
            <input type="text" id="price" name="price" value="{{ old('price', $service->price) }}">
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>