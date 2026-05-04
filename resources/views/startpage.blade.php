<!DOCTYPE html>
<html>
<head>
    <title>Startpage</title>
</head>
<body>
    <h1>Want to play a game?</h1>

    <h3>Current sessions</h3>
    @foreach ($sessions as $session)
        <p> 
            <a href="/sessions/{{ $session->id }}">
                {{ $session->name }}
            </a>
        </p>
    @endforeach

    <form method=POST action=/sessions>
        @csrf
        <label>Session name</label>
        <Input type="text" name="name" required>
        <button type="submit">Create session</button>
    </form>  

</body>