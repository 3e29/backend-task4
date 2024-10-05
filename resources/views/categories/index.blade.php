

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .deleted {
            color: #6c757d;
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Categories List</h2>
        <div class="mb-3">
            <a href="/" class="btn btn-primary">Home</a>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="{{ $category->deleted_at ? 'deleted' : '' }}">
                        <td>{{ $category->name }}</td>
                        <td>
                            @if(!$category->deleted_at)
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endif
                            @if(!$category->deleted_at)
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                            @if($category->deleted_at)
                                <form action="{{ route('categories.restore', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                </form>
                            @endif

                                <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-sm">Permenant Delete</button>
                                </form>

                            @if(!$category->deleted_at)
                            <form action="{{ route('categories.show', $category->id) }}" method="GET" style="display:inline;">
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

