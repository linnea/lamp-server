<table class="table">
    <th>Title</th>
    <th>Release Date</th>
    <th>Tickets Sold</th>
    <th>Gross</th>
    <?php foreach ($matches as $match): ?>
        <tr>
            <td><a href="/views/movie-view.php?id=<?= htmlentities($match['id'])?>"><?= htmlentities($match['title']) ?></a></td>
            <td><?= htmlentities(date('d-M-Y', strtotime($match['released']))) ?></td>
            <td><?= htmlentities(number_format($match['tickets'])) ?></td>
            <td>$<?= htmlentities(number_format($match['gross'])) ?></td>
        </tr>
    <?php endforeach ?>
</table>
    

