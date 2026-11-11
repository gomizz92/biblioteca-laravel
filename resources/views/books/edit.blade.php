<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Libro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Actualizar Libro</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="published_year">Año de Publicación</label>
                <input type="number" name="published_year" class="form-control" value="{{ $book->published_year }}" required>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría ID</label>
                <input type="number" name="category_id" class="form-control" value="{{ $book->category_id }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
