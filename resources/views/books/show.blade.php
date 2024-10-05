<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Book Details</title>
</head>
<body>
    <div class="container mt-5">
        <h2>{{ $book->title }}</h2>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Author:</strong> {{ $book->author->name }}</p>
        <p><strong>Categories:</strong>
            @foreach($book->categories as $category)
                {{ $category->name }}
                @if(!$loop->last), @endif
            @endforeach
        </p>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit Book</a>


        @if(!$book->deleted_at)
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
        <form action="{{ route('books.forceDelete', $book->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">Permenant Delete</button>
        </form>
    </div>
</body>
</html>
