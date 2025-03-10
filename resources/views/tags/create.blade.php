<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tag</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Tag</h1>

        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tag Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Create</button>
        </form>
    </div>
</body>
</html>
