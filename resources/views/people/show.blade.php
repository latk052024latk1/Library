<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>


<div class="container2">@include('search.form')

        <h2>Entity Details</h2>


        <table>
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$person->person_name}} {{$person->person_surname}}</td>
                </tr>
                <tr>
                    <th>Birth date</th>
                    <td>{{$person->birth_date}}</td>
                </tr>
                @if ($person->death_date)
                <tr>
                    <th>Death date</th>
                    <td>{{$person->death_date}}</td>
                </tr>
                @endif
            </tbody>
        </table>
    
<br>
<br>
<br>
<h2>Books</h2>
@foreach($books as $book)
    <article>
        <b>Title: {{ $book->title }}</b><br>
        <span> Genre(s): @foreach ($book->genres as $genre) {{ $genre->genre_name }} @endforeach </span>
        <p>{{ $book->desc }}</p>
    </article>
@endforeach
</body>
</html>