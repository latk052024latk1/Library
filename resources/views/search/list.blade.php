<!DOCTYPE html> <!-- resources/views/search/results.blade.php -->
<html>
<head></head>
<body>


    @if ($category === 'books')
        <h2>Books</h2>
        <ul>
            @foreach ($results as $result)
            <a href="{{ route('books.show', ['book' => $result->book_id]) }}">
                <li>{{ $result->title }}</li>
            @endforeach
        </ul>
    @elseif ($category === 'people')
        <h2>People</h2>
        <ul>
            @foreach ($results as $result)
                <li>
                <a href="{{ route('people.show', ['person' => $result->person_id]) }}">
                {{ $result->person_name }}</li>
            @endforeach
        </ul>
    @else
        <p>Invalid category selected.</p>
    @endif

</body>
</html>