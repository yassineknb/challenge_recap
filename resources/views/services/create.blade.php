<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un Service</title>
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

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </div>
        
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>
        
        <div>
            <label for="duration">Durée (minutes) :</label>
            <input type="number" id="duration" name="duration" value="{{ old('duration') }}">
        </div>

        <div>
            <label for="price">Prix :</label>
            <input type="text" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div>
            <label for="image">Image :</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>