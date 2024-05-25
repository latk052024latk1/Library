<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('genres.store') }}">
    @csrf

    <div>
        <label for="genre_name">Name:</label>
        <input type="text" name="genre_name" id="genre_name" required>
    </div>

    <div>
        <label for="genre_desc">Description:</label>
        <textarea name="genre_desc" id="genre_desc" required></textarea>
    </div>
    
    <input type="submit" value='Create a genre'>
</form>
</div>
</body>
</html>