<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
</head>
<body>

<h1 class="d-flex justify-content-center text-white bg-danger py-3 mb-3">Goodcard - track your collection of Pokémon cards</h1>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col" class="d-flex justify-content-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cards as $card) : ?>
            <tr>
                <th scope="row"><?= $card['id'] ?></th>
                <td><?= $card['name'] ?></td>
                <td><?= $card['type'] ?></td>
                <td class="d-flex justify-content-center">
                    <a href="index.php?action=Update&id=<?php echo $card['id']?>" class="btn btn-primary me-2">Update</a>
                    <a href="index.php?action=Delete&id=<?php echo $card['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <aside class="d-flex justify-content-end">
        <form method="get" action="index.php">
            <input class="btn btn-primary" type="submit" value="Create" name="action">
        </form>
    </aside>
</div>

</body>
</html>