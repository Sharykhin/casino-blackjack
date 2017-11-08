
<script>
    var sessId = false;
    var sessIdValue = null;
    document.cookie.split("=").forEach(function(item, index) {
        if (sessId === true) {
            sessIdValue = item;
            sessId = false;
        }
        if (item === 'PHPSESSID') {
            sessId = true;
        }
    });

    var conn = new WebSocket('ws://<?= $socket['host']; ?>:<?= $socket['port']; ?>');
    conn.onopen = function(e) {
        console.log("Connection established!");
        conn.send(JSON.stringify({sessid: sessIdValue, action: null}));
        conn.send(JSON.stringify({sessid: sessIdValue, action: 'getPlayers'}));
    };

    conn.onmessage = function(e) {
        console.log(e.data);
        try {
            var socketData = JSON.parse(e.data);
            if (socketData.action === 'getPlayers') {
                window.gameData = window.gameData || {};
                window.gameData.playersNum = JSON.parse(e.data).playersNum;
                if (window.gameData.playersNum === 1) {
                    document.querySelector('#playersNum').innerHTML = 'There is only you. So let\'s wait until somebody connects to us.';
                } else if (window.gameData.playersNum > 1) {
                    document.querySelector('#playersNum').innerHTML = 'There are ' + window.gameData.playersNum + ' players so we can start the game';
                }
            }

            if (socketData.action === 'startPlaying') {
                window.gameData.cards = socketData.cards;
                var html = '';
                var score = 0;
                window.gameData.cards.forEach(function (card) {
                    html += '<div class="card"><img src="/images/' + card.img + '" /></div>';
                    score += card.score;
                });
                html += '<div>score:<b>' + score + '</b></div>';
                document.querySelector('#player-table').innerHTML = html;
            }
        } catch (e) {
            console.warn(e);
        }
    };

    document.querySelector('#startPlaying').onclick = function () {
        conn.send(JSON.stringify({sessid: sessIdValue, action: 'startPlaying'}));
    };
</script>
