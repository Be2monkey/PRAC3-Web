<div>
    <form action="{{route('teams.store')}}" method="POST">
        @csrf
        <label>Team name</label>
        <input type="string" name="teamName"><br>

        <label>Number of players</label>
        <input type="number" name="numberOfPlayers"><br>

        <label>player names</label>
        <textarea rows="10" name="playerNames"></textarea><br>
        <input type="submit">
    </form>
</div>
