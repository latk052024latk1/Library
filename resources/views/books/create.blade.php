<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('books.store') }}">
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="desc">Description:</label>
        <textarea name="desc" id="desc" required></textarea>
    </div>
    <select name="language_id">
    <option value="">Select Language</option>
    @foreach($languages as $language)
        <option value="{{ $language->language_id }}">{{ $language->language_name }}</option>
    @endforeach
</select>

    <div>
        <label for="pages">Pages:</label>
        <input type="number" name="pages" id="pages" required>
    </div>

    <input type="submit">Create Book</button>
</form>
</div>
</body>
</html>