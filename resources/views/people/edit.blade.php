<!DOCTYPE html>
<html>
<head>
@vite('resources/js/app.js')
</head>
<body>
<div class="container">
<form method="POST" action="{{ route('people.update', $person->person_id) }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $person->person_name }}" required>
    
    <label for="name">Surname:</label>
    <input type="text" name="surname" id="surname" value="{{ $person->person_surname }}" required>
    
    <label for="name">Birth date:</label>
    <input type="text" name="birth" id="birth" value="{{ $person->birth_date }}">
    
    <label for="name">Death date:</label>
    <input type="text" name="death" id="death" value="{{ $person->death_date }}">

    <input type="submit">Update the data</button>
</form>
</div>
</body>
</html>