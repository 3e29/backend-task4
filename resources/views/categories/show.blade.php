{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Category Details</div>
                    <div class="card-body">
                        <h5>Category Name: {{ $category->name }}</h5>

                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning mt-3">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        @if ($category->trashed())
                            <form action="{{ route('categories.restore', $category->id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>

                            <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Force Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Category Details</h2>
        <a href="{{ route('categories.index', $category->id) }}" class="btn btn-primary btn-sm mb-2">Back</a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $category->name }}</h5>
                <div class="mb-3">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('categories.restore', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-info">Restore</button>
                    </form>
                    <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark">Force Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
