<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awards | Laravel IMDB</title>
</head>
<body>

    <h1>List of awards</h1>

    <ul>
        <?php foreach ($awards as $award) : ?>
            <li>
                <?= $award ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>