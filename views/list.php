<h1>Search Movies</h1>
<form action="" method="GET">
    <div class="form-group">
        <input type="text" 
            id="qInput" 
            name="q"
            class="form-control" 
            value="<?= htmlentities($q) ?>"
            placeholder="enter a movie title"
            required
            >
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Get Movie</button>
    </div>
</form>
