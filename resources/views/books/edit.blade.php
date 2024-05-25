<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('books.update', $book->book_id) }}">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $book->title }}" required>
    
    <label for="desc">Description:</label>
    <textarea name="desc" id="desc" required>{{ $book->desc }}</textarea>

    <label for="language_id">Language:</label>
    <select name="language_id" id="language_id">
        <option value="">Select Language</option>
        @foreach($languages as $language)
            <option value="{{ $language->language_id }}" {{ $book->language_id == $language->language_id ? 'selected' : '' }}>
                {{ $language->language_name }}
            </option>
        @endforeach
    </select>

    <label>Genres:</label><br>
    @foreach($genres as $genre)
        <input type="checkbox" name="genres[]" value="{{ $genre->genre_id }}" {{ $book->genres->contains($genre->genre_id) ? 'checked' : '' }}>
        <label>{{ $genre->genre_name }}</label><br>
    @endforeach

    <label for="pages">Pages:</label>
    <input type="number" name="pages" id="pages" value="{{ $book->pages }}" required>

    <input type="submit">Update Book</button>
</form>
</div>
</body>
</html>