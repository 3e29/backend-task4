<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Book</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Create a New Book</h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select class="form-select" id="author_id" name="author_id" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Categories</label><br>
                @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
                        <label class="form-check-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Create Book</button>
        </form>
    </div>
</body>
</html>
