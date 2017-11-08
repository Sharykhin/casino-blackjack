<?php if ($isGameRunning === true) { ?>
    <div class="opponent-table">
        <?php foreach ($opponentCards as $card) { ?>
            <div class="card <?php if (!is_null($result)) echo 'show-all'; ?>">
                <img src="/images/<?= $card['img'] ?>" />
            </div>
        <?php } ?>
        <span>
        Opponent score is:
        <b>
            <?php if (!is_null($result)) { ?>
                <?= array_sum(array_column($opponentCards, 'score'));?>
            <?php } else { ?>
                unknown
            <?php } ?>
        </b>
    </span>
    </div>
<?php } ?>