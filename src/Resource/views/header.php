<html>
    <head>
        <title>BlackJack</title>
    </head>
    <body>
    <fieldset title="Game Form">
        <?php if (!$isGameRunning) { ?>
            <form method="post" action="/actions/gameStart.php">
                <input type="text" name="name" placeholder="Enter your name" />
                <input type="text" name="money" placeholder="Enter your bid" />
                <button name="gameStart" type="submit">Start the Game</button>
            </form>
        <?php } else { ?>
            <form method="post" action="/actions/gameStop.php">
                <p>
                    The game is running, <?= $playerName; ?>
                </p>
                <p>
                    Opponent comments: <?= $opponentComment; ?>
                </p>
                <button name="gameStop" type="submit">Stop the Game</button>
            </form>
        <?php } ?>
    </fieldset>