<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Agregar Libro</h1>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" required>
                @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" name="author" class="form-control" required>
                @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="form-group">
                <label for="published_year">Año de Publicación</label>
                <input type="number" name="published_year" class="form-control" required>
                @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Categoría:</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Todas las categorías</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            <button type="submit" class="btn btn-primary">Agregar Libro</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>