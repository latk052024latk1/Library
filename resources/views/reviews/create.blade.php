<!DOCTYPE html>
<html>
    <head>
    @vite('resources/js/app.js')
</head>
<body>
<div class="container">

    <h1>{{$book->title}}</h1>
<form method="POST" action="{{ route('reviews.store', ['book' => $book]) }}">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book->book_id }}">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="surname">Text:</label>
        <textarea name="text" id="text" required></textarea>
    </div>
    

    <input type="submit">Add a review</button>
</form>
</div>
</body>
</html>