<form style="text-align:center" action="{{route('search')}}" method="GET">
@csrf
<input type="text" id="query" name="query" style="width:50%;"><br>
<input type="radio" id="category" name="category" value="books">Books
<input type="radio" id="category" name="category" value="people">People <br><br>
<input type="submit">
</form>