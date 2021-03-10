<div class="container px-1">    
    <form action="index.php" method="get">
        <div class="form-floating mb-3">
            <input class="form-control" type="number" id="guitarID" name="guitar_id" placeholder="666">
            <label for="userNumber">Enter an Guitar ID number</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" id="ampID" name="amp_id" placeholder="foo">
            <label for="userString">Enter a Amp ID number</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" onclick="window.location.href='http://localhost/index.php';" class="btn btn-primary">Clear</button>
        <button type="submit" name="show_all" value="true" class="btn btn-primary">Show All</button>
    </form>
</div>
