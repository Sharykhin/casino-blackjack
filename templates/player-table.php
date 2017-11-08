<?php if ($isGameRunning === true) { ?>
    <div class="player-table">
        <?php foreach ($playerCards as $card) { ?>
            <div class="card">
                <img src="/images/<?= $card['img'] ?>" />
            </div>
        <?php } ?>

        <span>Your score is:<b><?= $playerSum; ?></b></span>
        <?php if ($playerSum > 21) { ?>
            <h3>You lost <?= $playerBid; ?>$.</h3>
            <form method="post" action="">
                <label>Would you like to restart the game with the same bid?</label>
                <button name="gameStart">Restart the Game</button>
            </form>
        <?php } else { ?>
            <?php if (!$opponentSteps) { ?>
                <form method="post" action="/actions/takeOneCard.php">
                    <button name="takeOneCard" type="submit">Take One</button>
                </form>
                <form method="post" action="/actions/enoughCards.php">
                    <button name="enoughCards" type="submit">Enough</button>
                </form>
            <?php } else { ?>
                <h4>Wait your opponent steps.</h4>
            <?php } ?>
        <?php } ?>

    </div>
<?php } ?>