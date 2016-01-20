<!-- A view that lets the user search the movies -->
<h4>Search Movies:</h4>
<form action="" method="GET">
    <div class="form-group input-group custom-search-form">
        <input type="text" 
            id="qInput" 
            name="q"
            class="form-control" 
            value="<?= htmlentities($q) ?>"
            placeholder="Enter a title..."
            >
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
    </div>
</form>
