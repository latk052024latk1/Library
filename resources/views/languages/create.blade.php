<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('languages.store') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <input type="submit" value='Create a language'>
</form>
</div>
</body>
</html>