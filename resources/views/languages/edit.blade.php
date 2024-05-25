<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('languages.update', $language->language_id) }}">
    @csrf
    @method('PUT')

    <label for="name">Title:</label>
    <input type="text" name="name" id="name" value="{{ $language->language_name }}" required>
    

    <input type="submit">Update the language</button>
</form>
</div>
</body>
</html>