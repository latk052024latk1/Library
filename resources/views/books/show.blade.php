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
                    <td>{{$book->title}}</td>
                </tr>
                <tr>
                    <th>Language</th>
                    <td>{{$book->languages->language_name}}</td>
                </tr>
                <tr>
                    <th>Pages</th>
                    <td>{{$book->pages}}</td>
                </tr>
                <tr>
                    <th>Authors</th>
                    <td> @foreach ($book->people as $person) {{$person->person_name}} {{$person->person_surname}}<br> @endforeach </td>
                </tr>
            </tbody>
        </table>
    
<br>
<br>
<br>

<h2>Reviews</h2>
@foreach ($reviews as $review)
    <article>
        <b> Author: {{ $review->users->name }}</b><br>
        <b>{{ $review->review_name }}</b>
        <span>{{ $review->review_date }}</span>
        <p>{{ $review->review_text }}</p>
    </article>
@endforeach
</body>
</html>