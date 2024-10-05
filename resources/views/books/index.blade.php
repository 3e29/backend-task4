<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Books List</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Books List</h2>
        <a href="/" class="btn btn-primary">Home</a>
        <a href="{{ route('books.create') }}" class="btn btn-success">Add New Book</a>
        <div class="row mt-5">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            @if(!$book->deleted_at)
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Show</a>
                            @endif
                            @if($book->deleted_at)
                            <form action="{{ route('books.restore', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-info">Restore</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</body>
</html>
