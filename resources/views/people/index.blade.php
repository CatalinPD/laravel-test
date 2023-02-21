<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of people</title>
</head>
<body>

    <h1>People who are not Tom Holland</h1>

    <ul>
        <?php foreach ($people as $person) : ?>
            <li>
                <?= $person->fullname ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>