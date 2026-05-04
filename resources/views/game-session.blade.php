<!DOCTYPE html>
<html>
<head>
    <title>Game sessions</title>
</head>
<body>
    <h1> {{ $session->name }}</h1>

    <h3>Current players</h3>
    @foreach ($session->playerSessions as $playerSession)
        @php
            $totalBuyIn = $playerSession->buyIns->sum('amount');
            $totalCashOut = $playerSession->cashOuts->sum('amount');
            $profit = $totalCashOut - $totalBuyIn;
        @endphp

        <p>{{ $playerSession->player->display_name }}</p>
        <p>Total buy-in: {{ $totalBuyIn }}</p>
        <p>Total cash-out: {{ $totalCashOut }}</p>
        <p>Profit/loss: {{ $profit }}</p>
    @endforeach
    
    <h3>Add player</h3>
    <form method=POST action="/addplayer/{{ $session->id }}">
        @csrf
        <Label>Add player</label>
        <input type="text" name="display_name" required>
        <button type="submit">Add player</button>
    </form>

    <h3>Buy in</h3>

    <form method="POST" action="/buyin/{{ $session->id }}">
        @csrf

        <label>Select player</label>
        <select name="player_session_id" required>
            @foreach ($session->playerSessions as $playerSession)
                <option value="{{ $playerSession->id }}">
                    {{ $playerSession->player->display_name }}
                </option>
            @endforeach
        </select>

        <br>
        <br>

        <label>Amount</label>
        <input type="number" name="amount" required>

        <button type="submit">Submit</button>
    </form>

    <h3>Cash out</h3>

    <form method=POST action="/cashout/{{ $session->id }}">
        @csrf

        <Label>Cash out</label>
        <select name="player_session_id" required>
            @foreach($session->playerSessions as $playerSession)
                <option value="{{ $playerSession->id }}">
                    {{ $playerSession->player->display_name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>
        <label>Amount</label>
        <input type="number" name="amount">

        <button type="submit">Submit</button>
    </form>

    <p>
        <a href="/">
            Go back to start page
        </a>
    </p>
</body>