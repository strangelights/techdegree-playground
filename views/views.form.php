<div class="container px-1">    
    <form action="index.php" method="get">
        <div class="form-floating mb-3">
            <input class="form-control" type="number" id="guitarID" name="guitar_id" placeholder="666">
            <label for="userNumber">Enter an Guitar ID number</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="number" id="ampID" name="amp_id" placeholder="foo">
            <label for="userString">Enter a Amp ID number</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" name="random" value="true" class="btn btn-success">Random</button>
        <button type="submit" name="show_all" value="true" class="btn btn-warning">Show All</button>
        <button type="button" onclick="window.location.href='http://localhost/index.php';" class="btn btn-danger">Clear</button>
    </form>
</div>
