<?php
$playerSum = array_sum(array_column($playerCards, 'score'));
?>

<?php if (!is_null($result)) { ?>
    <h3>Result: <?php if ($result < 0) { echo "You won";} else if ($result > 0) {echo "You lost";} else { echo "Nobody won";} ?> <?= $playerBid; ?>$</h3>
    <form method="post" action="">
        <button name="gameStart" type="submit">Restart</button>
    </form>
<?php } ?>
<?php require 'player-table.php'; ?>

<?php if ($isGameRunning === true) { ?>
<hr />
<?php } ?>

<?php require 'opponent-table.php'; ?>

<div class="block-control">
    <div>
        <img width="50" src="/images/black_joker.jpg">
    </div>
    <p><?= sizeof($cards) ?> cards left of 52.</p>
</div>

<style>
    .card {
        display: inline-block;
    }

    .card img {
        width: 100px;
    }

    .opponent-table .card:first-child {
        border: 1px solid #ccc;
    }

    .opponent-table .card:first-child img {
        opacity: 0;
    }

    .show-all img {
        opacity: 1 !important;
    }

</style>

<form method="post" action="" style="display: none;">
    <input type="submit" name="waitAndTakeMore" id="waitAndTakeMore">
</form>
<script>
    <?php if ($waitAndTakeMore) : ?>
        setTimeout(function () {
            console.log('submit the form');
            document.querySelector('#waitAndTakeMore').click();
        }, 4000);
    <?php endif; ?>
</script>