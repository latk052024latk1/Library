<!DOCTYPE html>
<html>
<body>
<head>
@vite('resources/js/app.js')
</head>
<div class="container2">
@include('search.form')

{{$book->title}}<br>
<hr>

@foreach ($reviews as $review)

    <article>
        <b>Author: {{ $review->user_id }} {{ $review->users->username }}</b><br>
        <b>{{ $review->review_name }}</b></br>
        <span>{{ $review->review_date }}</span>
        <p>{{ $review->review_text }}</p>
        <span class="upvote">{{$review->upvotes->count()}}</span>

        @if ($review->isUpvotedBy(auth()->user()))
    <form action="{{ route('upvotes.deleteUpvote', ['book' => $book->book_id,'review' => $review->review_id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Remove Upvote</button>
    </form>
@else
    <form action="{{ route('upvotes.addUpvote', ['book' => $book->book_id, 'review' => $review->review_id]) }}" method="POST">
        @csrf
        <button type="submit">Upvote</button>
    </form>
@endif
    </article>
@endforeach

</div>

</body>
</html>