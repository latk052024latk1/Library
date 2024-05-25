<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('genres.update', $genre->genre_id) }}">
    @csrf
    @method('PUT')

    <label for="name">Title:</label>
    <input type="text" name="name" id="name" value="{{ $genre->genre_name }}" required>
    
    <label for="name">Title:</label>
    <input type="text" name="desc" id="desc" value="{{ $genre->genre_desc }}" required>
    

    <input type="submit">Update the language</button>
</form>
</div>
</body>
</html>