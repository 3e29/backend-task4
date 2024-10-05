{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Authors List</h2>
        <div class="mb-3">
            <a href="{{ route('authors.create') }}" class="btn btn-success">Add Author</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @if(!$author->deleted_at)
                            <form action="{{ route('authors.restore', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">Restore</button>
                            </form>
                            @endif
                            @if($author->deleted_at)
                            <form action="{{ route('authors.forceDelete', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark btn-sm">Force Delete</button>
                            </form>
                            @endif
                            <form action="{{ route('authors.show', $author->id) }}" method="get" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm">Show</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .deleted {
            color: #6c757d; /* Muted color for soft-deleted records */
            text-decoration: line-through; /* Optional: Strikethrough for visual indication */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Authors List</h2>
        <div class="mb-3">
            <a href="/" class="btn btn-primary">Home</a>
            <a href="{{ route('authors.create') }}" class="btn btn-success">Add Author</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr class="{{ $author->deleted_at ? 'deleted' : '' }}"> <!-- Apply deleted class if soft-deleted -->
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td>
                            @if(!$author->deleted_at)
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endif
                            @if(!$author->deleted_at)
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                            @if($author->deleted_at)
                                <form action="{{ route('authors.restore', $author->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                </form>
                            @endif

                                <form action="{{ route('authors.forceDelete', $author->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-sm">Permenant Delete</button>
                                </form>

                            @if(!$author->deleted_at)
                            <form action="{{ route('authors.show', $author->id) }}" method="get" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Show</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
