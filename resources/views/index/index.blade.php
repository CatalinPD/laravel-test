<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel IMDB</title>
</head>
<body>

    <h1>Laravel IMDB project</h1>

    <p>Welcome to the Laravel IMDB project</p>

    <h2>Top movies</h2>

    <ul>
        <?php foreach ($movies as $movie) : ?>
            <li>
                <?= $movie->name ?>
                (<?= $movie->year ?>)
                <br>
                Type: <?= $movie->movieType->name ?>
                <br>
                Genres:
                <ul>
                    <?php foreach ($movie->genres as $genre) : ?>
                        <li>
                            <?= $genre->name ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>