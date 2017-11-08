
<script>
    var conn = new WebSocket('ws://<?= $socket['host']; ?>:<?= $socket['port']; ?>');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        console.log(e.data);
    };

    conn.send(JSON.stringify({sessId: }))
    <?php if ($isGameStarted) { ?>

    <?php } ?>
</script>
