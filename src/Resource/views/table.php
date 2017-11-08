<form method="post" action="/actions/gameStop">
    <p>
        The game is running, <?= $playerName; ?>.
        <span id="playersNum"></span>
    </p>
    <button type="submit">Leave the Game</button>
    <button type="button" id="startPlaying">Start Playing...</button>
</form>

<div id="player-table">
</div>
<style>
    #player-table .card {
        display: inline-block;
    }

    #player-table .card img {
        width: 125px;
    }
</style>