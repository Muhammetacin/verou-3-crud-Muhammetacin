<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Goodcard - track your collection of Pokémon cards</h1>

<ol>
    <?php foreach ($cards as $card) : ?>
        <li><?= $card['name'] ?> <br>
            <a href="">Edit</a>
            <a href="index.php?id=<?php echo $card['id'] ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ol>

<p>
    Show the first item: <?= $firstCard[0]['name'] ?>
</p>

<form method="get" action="index.php">
    <label for="createCard">Create new card</label><br>
    <input type="submit" value="Create" name="action">
</form>

<form>
    <h2>Select number from list and delete type</h2>
    <label> ID:
        <input type="text" name="deleteId">
    </label>
    <input type="submit" value="Delete" name="action">
</form>

</body>
</html>