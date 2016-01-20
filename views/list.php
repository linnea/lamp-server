<!-- 
    Shows the list of all movies in the database, or shows all of the movies
    that matched the query string
-->
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover dataTable no-footer">
        <thead>
        <th>Title</th>
        <th>Release Date</th>
        <th>Tickets Sold</th>
        <th>Gross</th>
        </thead>
        <!-- iterate over each match if there are any -->
        <?php if($matches) { foreach ($matches as $match) { ?>
        <tbody>
            <tr>
                <td><a href="views/movie-view.php?id=<?= htmlentities($match['id'])?>"><?= htmlentities($match['title']) ?></a></td>
                <td><?= htmlentities(date('d-M-Y', strtotime($match['released']))) ?></td>
                <td><?= htmlentities(number_format($match['tickets'])) ?></td>
                <td>$<?= htmlentities(number_format($match['gross'])) ?></td>
            </tr>
        </tbody>
        <!-- and if there aren't any matches, display that-->
        <?php } } else { $str="No results found for '$q'"; }?>
    </table>
    <!-- But display it after the table -->
    <p style="text-align: center"><?=$str?></p>
</div>