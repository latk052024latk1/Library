<!DOCTYPE html>
<html>

<head>
@vite('resources/js/app.js')
</head>

    <script type="module" src="../js/main.js"></script> <!-- Adjust the path as needed -->

<body>
<div class="container"
<form method="POST" action="{{ route('people.store') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname" required></textarea>
    </div>
    
    <div>
        <label for="birth">Birth date:</label>
        <input type="date" name="birth" id="birth" required>
    </div>

    <div>
        <label for="death">Death date:</label>
        <input type="date" name="death" id="death" required>
    </div>

    <input type="submit">Add a person</button>
</form>
</div>
</body>
</html>