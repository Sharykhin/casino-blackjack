<script>
    window.gameData = {};

    var sessId = false;
    var sessIdValue = null;
    var conn = null;

    document.cookie.split("=").forEach(function(item) {
        if (sessId === true) {
            sessIdValue = item;
            sessId = false;
        }
        if (item.search('PHPSESSID') !== -1) {
            sessId = true;
        }
    });


    function _socketConnect() {
        conn = new WebSocket('ws://<?= $socket['host']; ?>:<?= $socket['port']; ?>');
        conn.onopen = function(e) {
            console.log("Connection established!");
            conn.send(JSON.stringify({sessid: sessIdValue, action: 'connect'}));
            conn.send(JSON.stringify({sessid: sessIdValue, action: 'getPlayers'}));
        };

        conn.onclose = function (e) {
            console.log(e);
            if (e.wasClean === false) {
                setTimeout(function () {
                    _socketConnect();
                }, 10000);
            }
        };

        conn.onmessage = function(e) {
            console.log(e.data);
            try {
                var socketData = JSON.parse(e.data);
                if (socketData.action === 'getPlayers') {
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

                if (socketData.action === 'playerJoined') {
                    document.querySelector('#players').innerHTML = '<div>A new player has just joined the game, name is ' + socketData.name +  '. Bid: ' + socketData.bid + '</div>';
                }

            } catch (e) {
                console.warn(e);
            }
        };
    }

    if (document.querySelector('#startPlaying')) {
        document.querySelector('#startPlaying').onclick = function () {
            conn.send(JSON.stringify({sessid: sessIdValue, action: 'startPlaying'}));
        };
    }

    _socketConnect();

</script>
