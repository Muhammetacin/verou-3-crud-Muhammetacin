<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Pokèmon Database</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
</head>
<body>

<h1 class="d-flex justify-content-center text-white bg-danger py-3 mb-3"><a href="index.php" class="text-decoration-none text-white">The Pokèmon Database</a></h1>

<div class="container d-flex d-flex justify-content-center my-3">
    <input id="searchBar" type="text" name="search" placeholder="Search Pokèmon" class="form-control w-25 text-center">
    <button class="btn btn-primary ms-2">Search</button>
</div>

<div class="d-flex justify-content-between flex-row mb-5">
    <aside class="" style="padding-left: 7rem; padding-top: 1rem;">
        <form action="index.php" method="get">
            <input type="submit" value="Filter" name="action" class="btn btn-primary btn-sm"><br><br>
            <label><strong>Pokèmon Type</strong></label><br>

            <input type="checkbox" id="fire" name="type[]" value="Fire">
            <label for="fire"> Fire</label><br>
            <input type="checkbox" id="water" name="type[]" value="Water">
            <label for="water"> Water</label><br>
            <input type="checkbox" id="grass" name="type[]" value="Grass">
            <label for="grass"> Grass</label><br>
            <input type="checkbox" id="normal" name="type[]" value="Normal">
            <label for="normal"> Normal</label><br>
            <input type="checkbox" id="fighting" name="type[]" value="Fighting">
            <label for="fighting"> Fighting</label><br>
            <input type="checkbox" id="flying" name="type[]" value="Flying">
            <label for="flying"> Flying</label><br>
            <input type="checkbox" id="poison" name="type[]" value="Poison">
            <label for="poison"> Poison</label><br>
            <input type="checkbox" id="ground" name="type[]" value="Ground">
            <label for="ground"> Ground</label><br>
            <input type="checkbox" id="rock" name="type[]" value="Rock">
            <label for="rock"> Rock</label><br>
            <input type="checkbox" id="bug" name="type[]" value="Bug">
            <label for="bug"> Bug</label><br>
            <input type="checkbox" id="ghost" name="type[]" value="Ghost">
            <label for="ghost"> Ghost</label><br>
            <input type="checkbox" id="steel" name="type[]" value="Steel">
            <label for="steel"> Steel</label><br>
            <input type="checkbox" id="electric" name="type[]" value="Electric">
            <label for="electric"> Electric</label><br>
            <input type="checkbox" id="psychic" name="type[]" value="Psychic">
            <label for="psychic"> Psychic</label><br>
            <input type="checkbox" id="ice" name="type[]" value="Ice">
            <label for="ice"> Ice</label><br>
            <input type="checkbox" id="dragon" name="type[]" value="Dragon">
            <label for="dragon"> Dragon</label><br>
            <input type="checkbox" id="dark" name="type[]" value="Dark">
            <label for="dark"> Dark</label><br>
            <input type="checkbox" id="fairy" name="type[]" value="Fairy">
            <label for="fairy"> Fairy</label><br>
        </form>
    </aside>

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
                        <a href="show.php?name=<?= $card['name'] ?>" class="btn btn-success me-2">Details</a>
                        <a href="index.php?action=Update&id=<?php echo $card['id'] ?>"
                           class="btn btn-warning me-2">Update</a>
                        <a href="index.php?action=Delete&id=<?php echo $card['id'] ?>&name=<?= $card['name'] ?>"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <aside class="d-flex justify-content-end">
            <form method="get" action="index.php">
                <input class="btn btn-primary btn-lg display-1" type="submit" value="Create" name="action">
            </form>
        </aside>
    </div>
</div>

</body>
</html>